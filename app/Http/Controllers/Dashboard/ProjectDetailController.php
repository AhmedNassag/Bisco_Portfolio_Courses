<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProjectDetail;
use Illuminate\Support\Facades\DB;
use App\Notifications\ProjectDetailAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class ProjectDetailController extends Controller
{

    public function index(Request $request)
    {
        $data = ProjectDetail::
        when($request->details != null, function ($q) use ($request) {
            return $q->where(function ($query) use ($request) {
                $query->where('details_ar', 'like', '%' . $request->details . '%')
                    ->orWhere('details_en', 'like', '%' . $request->details . '%');
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
        return view('dashboard.project-detail.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'details'   => $request->details,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
        ]);
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'details_ar' => 'required|string',
                'details_en' => 'required|string',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            //insert data
            $projectDetail = ProjectDetail::create([
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
            ]);
            if (!$projectDetail) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new ProjectDetailAdded($projectDetail->id));

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
            $data = ProjectDetail::find($id);
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
                'details_ar' => 'required|string',
                'details_en' => 'required|string',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            $projectDetail  = ProjectDetail::findOrFail($request->id);
            if (!$projectDetail) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //update data
            $projectDetail->update([
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
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
            // $related_table = RelatedModel::where('project_detail_id', $request->id)->pluck('project_detail_id');
            // if($related_table->count() == 0) { 
                $projectDetail = ProjectDetail::findOrFail($request->id);
                if (!$projectDetail) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $projectDetail->delete();
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
                // $related_table = RelatedModel::where('project_detail_id', $selected_id)->pluck('project_detail_id');
                // if($related_table->count() == 0) {
                    $projectDetails = ProjectDetail::whereIn('id', $delete_selected_id)->get();
                    foreach($projectDetails as $projectDetail)
                    {
                        $projectDetail->delete();
                    }
                    if(!$projectDetails) {
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
        
        $data    = ProjectDetail::paginate(10);
        $trashed = false;
        return view('dashboard.project-detail.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'details'   => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
