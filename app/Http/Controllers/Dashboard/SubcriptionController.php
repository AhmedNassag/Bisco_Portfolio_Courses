<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Subcription;
use Illuminate\Support\Facades\DB;
use App\Notifications\SubcriptionAdded;
use App\Notifications\SubcriptionChangeStatusAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class SubcriptionController extends Controller
{

    public function index(Request $request)
    {
        $data = Subcription::
        when($request->course_item_id != null,function ($q) use($request){
            return $q->where('course_item_id',$request->course_item_id);
        })
        ->when($request->user_id != null,function ($q) use($request){
            return $q->where('user_id',$request->user_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at','>=',$request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at','<=',$request->to_date);
        })
        ->paginate(10);

        $courseItems = CourseItem::get(['id','name_ar','name_en']);
        $users       = User::get(['id','name']);
        $trashed = false;
        return view('dashboard.subcription.index')
        ->with([
            'data'           => $data,
            'courseItems'    => $courseItems,
            'users'          => $users,
            'trashed'        => $trashed,
            'user_id'        => $request->user_id,
            'course_item_id' => $request->course_item_id,
            'from_date'      => $request->from_date,
            'to_date'        => $request->to_date,
        ]);
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'course_item_id' => 'required|integer|exists:course_items,id',
                'user_id'        => 'required|integer|exists:users,id',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            //insert data
            $subcription = Subcription::create([
                'course_item_id' => $request->course_item_id,
                'user_id'        => $request->user_id,
            ]);
            if (!$subcription) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new SubcriptionAdded($subcription->id));

            session()->flash('success');
            return response()->json([
                'status'   => true,
                'messages' => 'تم الحفظ بنجاح',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeStatus($id)
    {
        try {
            $subcription = Subcription::find($id);
            if($subcription->status == 0)
            {
                $subcription->update(['status' => 1]);
            }
            else
            {
                $subcription->update(['status' => 0]);
            }
            if(!$subcription)
            {
                session()->flash('error');
                return redirect()->back();
            }

            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new SubcriptionChangeStatusAdded($subcription->id));
            session()->flash('success');
            return redirect()->back();

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
        
        $data    = Subcription::paginate(10);
        $trashed = false;
        return view('dashboard.subcription.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
