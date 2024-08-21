<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\CourseItem;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use App\Notifications\SubscriptionAdded;
use App\Notifications\SubscriptionChangeStatusAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class SubscriptionController extends Controller
{

    public function index(Request $request)
    {
        $data = Subscription::
        when($request->course_item_id != null,function ($q) use($request){
            return $q->where('course_item_id',$request->course_item_id);
        })
        ->when($request->user_id != null,function ($q) use($request){
            return $q->where('user_id',$request->user_id);
        })
        ->when($request->status != null,function ($q) use($request){
            return $q->where('status',$request->status);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at','>=',$request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at','<=',$request->to_date);
        })
        ->paginate(10);

        $courseItems = CourseItem::get(['id','name_ar','name_en']);
        $users       = User::where('roles_name', null)->get(['id','name']);
        $trashed = false;
        return view('dashboard.subscription.index')
        ->with([
            'data'           => $data,
            'courseItems'    => $courseItems,
            'users'          => $users,
            'trashed'        => $trashed,
            'user_id'        => $request->user_id,
            'course_item_id' => $request->course_item_id,
            'status'         => $request->status,
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
                session()->flash('error');
                return redirect()->back();
            }
            //insert data
            $subscription = Subscription::create([
                'course_item_id' => $request->course_item_id,
                'user_id'        => $request->user_id,
            ]);
            if (!$subscription) {
                return redirect()->route('site.courses')->with('error', __('main.Your request failed to send.'));
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new SubscriptionAdded($subscription->id));

            return redirect()->back()->with('success', __('main.Your request send successfully, soon after approved you will access to see this course.'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        try {
                $subscription = Subscription::findOrFail($request->id);
                if (!$subscription) {
                    session()->flash('error');
                    return redirect()->back()->with('error', __('main.An Error Occur'));;
                }
                $subscription->delete();
                session()->flash('success');
                return redirect()->back()->with('success', __('main.Deleted Successfully'));;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeStatus($id)
    {
        try {
            $subscription = Subscription::findOrFail($id);
            $subscription->update(['status' => !$subscription->status]);
            if(!$subscription)
            {
                session()->flash('error');
                return redirect()->back()->with('error', __('main.Sorry failed in changed subscribtion status.'));
            }

            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new SubscriptionChangeStatusAdded($subscription->id));
            session()->flash('success');
            return redirect()->back()->with('success', __('main.Status of subscribtion changed successfully.'));

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
        
        $data    = Subscription::paginate(10);
        $trashed = false;
        return view('dashboard.subscription.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
