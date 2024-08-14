<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partener;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use App\Notifications\PartenerAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class PartenerController extends Controller
{
    use ImageTrait;

    public function index(Request $request)
    {
        $data = Partener::
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
        return view('dashboard.partener.index')
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
                'name_ar' => 'nullable|string|max:191|unique:parteners,name_ar',
                'name_en' => 'nullable|string|max:191|unique:parteners,name_en',
                'url'     => 'nullable|string',
                'photo'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
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
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/partener');
            }
            //insert data
            $partener = Partener::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'url'     => $request->url,
                'photo'   => $photo_name,
            ]);
            if (!$partener) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new PartenerAdded($partener->id));

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
            $data = Partener::find($id);
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
                'name_ar' => 'nullable|string|max:191|unique:parteners,name_ar,'.$request->id,
                'name_en' => 'nullable|string|max:191|unique:parteners,name_en,'.$request->id,
                'url'     => 'nullable|string',
                'photo'   => 'nullable',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            $partener  = Partener::findOrFail($request->id);
            if (!$partener) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //upload image
            $photo_name = null;
            if ($request->hasFile('photo')) {
                Storage::disk('attachments')->delete('partener/' . $partener->photo);
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/partener');
            }
            //update data
            $partener->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'url'     => $request->url,
                'photo'   => $request->hasFile('photo') ? $photo_name : $partener->photo,
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
            // $related_table = RelatedModel::where('partener_id', $request->id)->pluck('partener_id');
            // if($related_table->count() == 0) { 
                $partener = Partener::findOrFail($request->id);
                if (!$partener) {
                    session()->flash('error');
                    return redirect()->back();
                }
                if($partener->photo)
                {
                    Storage::disk('attachments')->delete('partener/' . $partener->photo);
                }
                $partener->delete();
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
                // $related_table = RelatedModel::where('partener_id', $selected_id)->pluck('partener_id');
                // if($related_table->count() == 0) {
                    $parteners = Partener::whereIn('id', $delete_selected_id)->get();
                    foreach($parteners as $partener)
                    {
                        if($partener->photo)
                        {
                            Storage::disk('attachments')->delete('partener/' . $partener->photo);
                        }
                        $partener->delete();
                    }
                    if(!$parteners) {
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
        
        $data    = Partener::paginate(10);
        $trashed = false;
        return view('dashboard.partener.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
