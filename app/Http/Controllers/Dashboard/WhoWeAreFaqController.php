<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WhoWeAreFaq;
use Illuminate\Support\Facades\DB;
use App\Notifications\WhoWeAreFaqAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class WhoWeAreFaqController extends Controller
{

    public function index(Request $request)
    {
        $data = WhoWeAreFaq::
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
        return view('dashboard.who-we-are-faq.index')
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
                'name_ar'    => 'required|string|max:191|unique:who_we_are_faqs,name_ar',
                'name_en'    => 'required|string|max:191|unique:who_we_are_faqs,name_en',
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
            $whoWeAreFaq = WhoWeAreFaq::create([
                'name_ar'    => $request->name_ar,
                'name_en'    => $request->name_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
            ]);
            if (!$whoWeAreFaq) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new WhoWeAreFaqAdded($whoWeAreFaq->id));

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
            $data = WhoWeAreFaq::find($id);
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
                'name_ar'    => 'required|string|max:191|unique:who_we_are_faqs,name_ar,'.$request->id,
                'name_en'    => 'required|string|max:191|unique:who_we_are_faqs,name_en,'.$request->id,
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
            $whoWeAreFaq  = WhoWeAreFaq::findOrFail($request->id);
            if (!$whoWeAreFaq) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //update data
            $whoWeAreFaq->update([
                'name_ar'    => $request->name_ar,
                'name_en'    => $request->name_en,
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
            // $related_table = RelatedModel::where('who_we_are_faq_id', $request->id)->pluck('who_we_are_faq_id');
            // if($related_table->count() == 0) { 
                $whoWeAreFaq = WhoWeAreFaq::findOrFail($request->id);
                if (!$whoWeAreFaq) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $whoWeAreFaq->delete();
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
                // $related_table = RelatedModel::where('who_we_are_faq_id', $selected_id)->pluck('who_we_are_faq_id');
                // if($related_table->count() == 0) {
                    $whoWeAreFaqs = WhoWeAreFaq::whereIn('id', $delete_selected_id)->get();
                    foreach($whoWeAreFaqs as $whoWeAreFaq)
                    {
                        $whoWeAreFaq->delete();
                    }
                    if(!$whoWeAreFaqs) {
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
        
        $data    = WhoWeAreSide::paginate(10);
        $trashed = false;
        return view('dashboard.who-we-are-faq.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
