<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompanyInformation;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use App\Notifications\CompanyInformationAdded;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class CompanyInformationController extends Controller
{
    use ImageTrait;

    public function index(Request $request)
    {
        $data = CompanyInformation::
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
        return view('dashboard.company-information.index')
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
                'name_ar'       => 'required|string',
                'name_en'       => 'required|string',
                'details_ar'    => 'required|string',
                'details_en'    => 'required|string',
                'address_ar'    => 'required|string',
                'address_en'    => 'required|string',
                'phone'         => 'nullable',
                'mobile'        => 'nullable',
                'whatsapp'      => 'nullable',
                'email'         => 'nullable',
                'facebook_url'  => 'nullable',
                'youtube_url'   => 'nullable',
                'linkedin_url'  => 'nullable',
                'twitter_url'   => 'nullable',
                'instagram_url' => 'nullable',
                'photo'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
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
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/company-information');
            }
            //insert data
            $companyInformation = CompanyInformation::create([
                'name_ar'       => $request->name_ar,
                'name_en'       => $request->name_en,
                'details_ar'    => $request->details_ar,
                'details_en'    => $request->details_en,
                'address_ar'    => $request->address_ar,
                'address_en'    => $request->address_en,
                'phone'         => $request->phone,
                'mobile'        => $request->mobile,
                'whatsapp'      => $request->whatsapp,
                'email'         => $request->email,
                'facebook_url'  => $request->facebook_url,
                'youtube_url'   => $request->youtube_url,
                'linkedin_url'  => $request->linkedin_url,
                'twitter_url'   => $request->twitter_url,
                'instagram_url' => $request->instagram_url,
                'photo'         => $photo_name,
            ]);
            if (!$companyInformation) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //send notification
            $users = User::where('id', '!=', Auth::user()->id)->select('id','name')->get();
            Notification::send($users, new CompanyInformationAdded($companyInformation->id));

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
            $data = CompanyInformation::find($id);
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
                'name_ar'       => 'required|string',
                'name_en'       => 'required|string',
                'details_ar'    => 'required|string',
                'details_en'    => 'required|string',
                'address_ar'    => 'required|string',
                'address_en'    => 'required|string',
                'phone'         => 'nullable',
                'mobile'        => 'nullable',
                'whatsapp'      => 'nullable',
                'email'         => 'nullable',
                'facebook_url'  => 'nullable',
                'youtube_url'   => 'nullable',
                'linkedin_url'  => 'nullable',
                'twitter_url'   => 'nullable',
                'instagram_url' => 'nullable',
                'photo'         => 'nullable',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'   => false,
                    'messages' => $validator->messages(),
                ]);
            }
            $companyInformation  = CompanyInformation::findOrFail($request->id);
            if (!$companyInformation) {
                session()->flash('error');
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            //upload image
            $photo_name = null;
            if ($request->hasFile('photo')) {
                Storage::disk('attachments')->delete('company-information/' . $companyInformation->photo);
                $photo_name = $this->uploadImage($request->file('photo'), 'attachments/company-information');
            }
            //update data
            $companyInformation->update([
                'name_ar'       => $request->name_ar,
                'name_en'       => $request->name_en,
                'details_ar'    => $request->details_ar,
                'details_en'    => $request->details_en,
                'address_ar'    => $request->address_ar,
                'address_en'    => $request->address_en,
                'phone'         => $request->phone,
                'mobile'        => $request->mobile,
                'whatsapp'      => $request->whatsapp,
                'email'         => $request->email,
                'facebook_url'  => $request->facebook_url,
                'youtube_url'   => $request->youtube_url,
                'linkedin_url'  => $request->linkedin_url,
                'twitter_url'   => $request->twitter_url,
                'instagram_url' => $request->instagram_url,
                'photo'         => $request->hasFile('photo') ? $photo_name : $companyInformation->photo,
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
            // $related_table = RelatedModel::where('company_information_id', $request->id)->pluck('company_information_id');
            // if($related_table->count() == 0) { 
                $companyInformation = CompanyInformation::findOrFail($request->id);
                if (!$companyInformation) {
                    session()->flash('error');
                    return redirect()->back();
                }
                if($companyInformation->photo)
                {
                    Storage::disk('attachments')->delete('company-information/' . $companyInformation->photo);
                }
                $companyInformation->delete();
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
                // $related_table = RelatedModel::where('company_information_id', $selected_id)->pluck('company_information_id');
                // if($related_table->count() == 0) {
                    $companyInformations = CompanyInformation::whereIn('id', $delete_selected_id)->get();
                    foreach($companyInformations as $companyInformation)
                    {
                        if($companyInformation->photo)
                        {
                            Storage::disk('attachments')->delete('company-information/' . $companyInformation->photo);
                        }
                        $companyInformation->delete();
                    }
                    if(!$companyInformations) {
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
        
        $data    = CompanyInformation::paginate(10);
        $trashed = false;
        return view('dashboard.company-information.index')
        ->with([
            'data'      => $data,
            'trashed'   => $trashed,
            'name'      => null,
            'from_date' => null,
            'to_date'   => null,
        ]);
    }
}
