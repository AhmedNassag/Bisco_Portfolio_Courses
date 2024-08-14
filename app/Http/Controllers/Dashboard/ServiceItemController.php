<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceItem;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use App\Notifications\ServiceItemAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class ServiceItemController extends Controller
{
    use ImageTrait;

    public function index(Request $request)
    {
        $data = ServiceItem::
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
        return view('dashboard.service-item.index')
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
                'name_ar'    => 'nullable|string|max:191|unique:service_items,name_ar',
                'name_en'    => 'nullable|string|max:191|unique:service_items,name_en',
                'details_ar' => 'nullable|string',
                'details_en' => 'nullable|string',
                'photo'      => 'required|image|mimes:jpeg,png,jpg,gif,svg',
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
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/service-item');
            }
            //insert data
            $serviceItem = ServiceItem::create([
                'name_ar'    => $request->name_ar,
                'name_en'    => $request->name_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'photo'      => $photo_name,
            ]);
            if (!$serviceItem) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new ServiceItemAdded($serviceItem->id));

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
            $data = ServiceItem::find($id);
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
                'name_ar'    => 'nullable|string|max:191|unique:service_items,name_ar,'.$request->id,
                'name_en'    => 'nullable|string|max:191|unique:service_items,name_en,'.$request->id,
                'details_ar' => 'nullable|string',
                'details_en' => 'nullable|string',
                'photo'      => 'nullable',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            $serviceItem  = ServiceItem::findOrFail($request->id);
            if (!$serviceItem) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //upload image
            $photo_name = null;
            if ($request->hasFile('photo')) {
                Storage::disk('attachments')->delete('service-item/' . $serviceItem->photo);
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/service-item');
            }
            //update data
            $serviceItem->update([
                'name_ar'    => $request->name_ar,
                'name_en'    => $request->name_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'photo'      => $request->hasFile('photo') ? $photo_name : $serviceItem->photo,
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
                $serviceItem = ServiceItem::findOrFail($request->id);
                if (!$serviceItem) {
                    session()->flash('error');
                    return redirect()->back();
                }
                if($serviceItem->photo)
                {
                    Storage::disk('attachments')->delete('service-item/' . $serviceItem->photo);
                }
                $serviceItem->delete();
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
                // $related_table = RelatedModel::where('who_we_are_side_id', $selected_id)->pluck('who_we_are_side_id');
                // if($related_table->count() == 0) {
                    $serviceItems = ServiceItem::whereIn('id', $delete_selected_id)->get();
                    foreach($serviceItems as $serviceItem)
                    {
                        if($serviceItem->photo)
                        {
                            Storage::disk('attachments')->delete('service-item/' . $serviceItem->photo);
                        }
                        $serviceItem->delete();
                    }
                    if(!$serviceItems) {
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
        
        $data    = ServiceItem::paginate(10);
        $trashed = false;
        return view('dashboard.service-item.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
