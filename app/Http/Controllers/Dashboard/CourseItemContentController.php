<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\CourseItemContent;
use App\Models\CourseItem;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use App\Notifications\CourseItemContentAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class CourseItemContentController extends Controller
{
    use ImageTrait;

    public function index(Request $request)
    {
        $data = CourseItemContent::
        when($request->name != null, function ($q) use ($request) {
            return $q->where(function ($query) use ($request) {
                $query->where('name_ar', 'like', '%' . $request->name . '%')
                    ->orWhere('name_en', 'like', '%' . $request->name . '%');
            });
        })
        ->when($request->course_item_id != null,function ($q) use($request){
            return $q->where('course_item_id',$request->course_item_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at','>=',$request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at','<=',$request->to_date);
        })
        ->paginate(10);

        $courseItems = CourseItem::get(['id','name_ar','name_en']);
        $trashed = false;
        return view('dashboard.course-item-content.index')
        ->with([
            'data'           => $data,
            'courseItems'    => $courseItems,
            'trashed'        => $trashed,
            'name'           => $request->name,
            'course_item_id' => $request->course_item_id,
            'from_date'      => $request->from_date,
            'to_date'        => $request->to_date,
        ]);
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name_ar'        => 'required|string|max:191|unique:course_item_contents,name_ar',
                'name_en'        => 'required|string|max:191|unique:course_item_contents,name_en',
                'course_item_id' => 'required|integer|exists:course_items,id',
                'sort' => [
                    'required',
                    'integer',
                    Rule::unique('course_item_contents')->where(function ($query) use ($request) {
                        return $query->where('course_item_id', $request->course_item_id);
                    }),
                ],
                'photo'          => 'required|file|mimes:mp4,avi,mov,mkv',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            // Upload photo
            $photo_name = null;
            if ($request->hasFile('photo')) {
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/course-item-content');
            }
            //insert data
            $courseItemContent = CourseItemContent::create([
                'name_ar'        => $request->name_ar,
                'name_en'        => $request->name_en,
                'course_item_id' => $request->course_item_id,
                'sort'           => $request->sort,
                'photo'          => $photo_name,
            ]);
            if (!$courseItemContent) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new CourseItemContentAdded($courseItemContent->id));

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
            $data = CourseItemContent::find($id);
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
                'name_ar'        => 'required|string|max:191|unique:course_item_contents,name_ar,'.$request->id,
                'name_en'        => 'required|string|max:191|unique:course_item_contents,name_en,'.$request->id,
                'course_item_id' => 'required|integer|exists:course_items,id',
                'sort'           => [
                    'required',
                    'integer',
                    Rule::unique('course_item_contents')->where(function ($query) use ($request) {
                        return $query->where('course_item_id', $request->course_item_id);
                    })
                    ->ignore($request->id),
                ],
                'photo'          => 'nullable|file|mimes:mp4,avi,mov,mkv',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            $courseItemContent  = CourseItemContent::findOrFail($request->id);
            if (!$courseItemContent) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //upload image
            $photo_name = null;
            if ($request->hasFile('photo')) {
                Storage::disk('attachments')->delete('course-item-content/' . $courseItemContent->photo);
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/course-item-content');
            }
            //update data
            $courseItemContent->update([
                'name_ar'        => $request->name_ar,
                'name_en'        => $request->name_en,
                'course_item_id' => $request->course_item_id,
                'sort'           => $request->sort,
                'photo'          => $request->hasFile('photo') ? $photo_name : $courseItemContent->photo,
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
                $courseItemContent = CourseItemContent::findOrFail($request->id);
                if (!$courseItemContent) {
                    session()->flash('error');
                    return redirect()->back();
                }
                if($courseItemContent->photo)
                {
                    Storage::disk('attachments')->delete('course-item-content/' . $courseItemContent->photo);
                }
                $courseItemContent->delete();
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
                // $related_table = RelatedModel::where('course_item_content_id', $selected_id)->pluck('course_item_content_id');
                // if($related_table->count() == 0) {
                    $courseItemContents = CourseItemContent::whereIn('id', $delete_selected_id)->get();
                    foreach($courseItemContents as $courseItemContent)
                    {
                        if($courseItemContent->photo)
                        {
                            Storage::disk('attachments')->delete('course-item-content/' . $courseItemContent->photo);
                        }
                        $courseItemContent->delete();
                    }
                    if(!$courseItemContents) {
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
        
        $data    = CourseItemContent::paginate(10);
        $trashed = false;
        return view('dashboard.course-item-content.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
