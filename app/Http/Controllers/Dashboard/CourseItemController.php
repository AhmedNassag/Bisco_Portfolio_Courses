<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CourseItem;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use App\Notifications\CourseItemAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class CourseItemController extends Controller
{
    use ImageTrait;

    public function index(Request $request)
    {
        $data = CourseItem::
        when($request->name != null, function ($q) use ($request) {
            return $q->where(function ($query) use ($request) {
                $query->where('name_ar', 'like', '%' . $request->name . '%')
                    ->orWhere('name_en', 'like', '%' . $request->name . '%');
            });
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at','>=',$request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at','<=',$request->to_date);
        })
        ->paginate(10);
        $trashed = false;
        return view('dashboard.course-item.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => $request->name,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
        ]);
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name_ar'     => 'required|string|max:191|unique:course_items,name_ar',
                'name_en'     => 'required|string|max:191|unique:course_items,name_en',
                'author_ar'   => 'required|string',
                'author_en'   => 'required|string',
                'hours_count' => 'required|numeric|gte:0',
                'rate'        => 'required|numeric|gte:0',
                'photo'       => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            // Upload image
            $photo_name = null;
            if ($request->hasFile('photo')) {
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/course-item');
            }
            //insert data
            $courseItem = CourseItem::create([
                'name_ar'     => $request->name_ar,
                'name_en'     => $request->name_en,
                'author_ar'   => $request->author_ar,
                'author_en'   => $request->author_en,
                'hours_count' => $request->hours_count,
                'rate'        => $request->rate,
                'photo'       => $photo_name,
            ]);
            if (!$courseItem) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new CourseItemAdded($courseItem->id));

            session()->flash('success');
            return response()->json([
                'status'   => true,
                'messages' => 'تم الحفظ بنجاح',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        try {
            $data = CourseItem::find($id);
            if(!$data)
            {
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            return response()->json([
                'status' => true,
                'data'   => $data,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name_ar'     => 'required|string|max:191'/*|unique:course_items,name_ar,'.$request->id*/,
                'name_en'     => 'required|string|max:191'/*|unique:course_items,name_en,'.$request->id*/,
                'author_ar'   => 'required|string',
                'author_en'   => 'required|string',
                'hours_count' => 'required|numeric|gte:0',
                'rate'        => 'required|numeric|gte:0',
                'photo'       => 'nullable',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            $courseItem  = CourseItem::findOrFail($request->id);
            if (!$courseItem) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //upload image
            $photo_name = null;
            if ($request->hasFile('photo')) {
                Storage::disk('attachments')->delete('course-item/' . $courseItem->photo);
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/course-item');
            }
            //update data
            $courseItem->update([
                'name_ar'     => $request->name_ar,
                'name_en'     => $request->name_en,
                'author_ar'   => $request->author_ar,
                'author_en'   => $request->author_en,
                'hours_count' => $request->hours_count,
                'rate'        => $request->rate,
                'photo'       => $request->hasFile('photo') ? $photo_name : $courseItem->photo,
            ]);
            session()->flash('success');
            return response()->json([
                'status'   => true,
                'messages' => 'تم الحفظ بنجاح',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        try {
            // $related_table = RelatedModel::where('who_we_are_side_id', $request->id)->pluck('who_we_are_side_id');
            // if($related_table->count() == 0) { 
                $courseItem = CourseItem::findOrFail($request->id);
                if (!$courseItem) {
                    session()->flash('error');
                    return redirect()->back();
                }
                if($courseItem->photo)
                {
                    Storage::disk('attachments')->delete('course-item/' . $courseItem->photo);
                }
                $courseItem->delete();
                session()->flash('success');
                return redirect()->back();
            // } else {
            //     session()->flash('canNotDeleted');
            //     return redirect()->back();
            // }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function deleteSelected(Request $request)
    {
        try {
            $delete_selected_id = explode(",", $request->delete_selected_id);
            foreach($delete_selected_id as $selected_id) {
                // $related_table = RelatedModel::where('course_item_id', $selected_id)->pluck('course_item_id');
                // if($related_table->count() == 0) {
                    $courseItems = CourseItem::whereIn('id', $delete_selected_id)->get();
                    foreach($courseItems as $courseItem)
                    {
                        if($courseItem->photo)
                        {
                            Storage::disk('attachments')->delete('course-item/' . $courseItem->photo);
                        }
                        $courseItem->delete();
                    }
                    if(!$courseItems) {
                        session()->flash('error');
                        return redirect()->back();
                    }
                    session()->flash('success');
                    return redirect()->back();
                // } else {
                //     session()->flash('canNotDeleted');
                //     return redirect()->back();
                // }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function showNotification($route_id,$notification_id)
    {
        $notification = NotificationModel::findOrFail($notification_id);
        $notification->update([
            'read_at' => now(),
        ]);
        
        $data    = CourseItem::paginate(10);
        $trashed = false;
        return view('dashboard.course-item.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
