<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SliderFooterController;
use App\Http\Controllers\Dashboard\WhoWeAreSideController;
use App\Http\Controllers\Dashboard\WhoWeAreDetailController;
use App\Http\Controllers\Dashboard\WhoWeAreFaqController;
use App\Http\Controllers\Dashboard\ServiceDetailController;
use App\Http\Controllers\Dashboard\ServiceItemController;
use App\Http\Controllers\Dashboard\ProjectDetailController;
use App\Http\Controllers\Dashboard\ProjectItemController;
use App\Http\Controllers\Dashboard\CourseItemController;
use App\Http\Controllers\Dashboard\CourseItemContentController;
use App\Http\Controllers\Dashboard\PartenerController;
use App\Http\Controllers\Dashboard\CompanyInformationController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\SubcriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

// Auth::routes(['register' => false]);
Route::Group(['middleware' => ['lang']], function () {
    Auth::routes();
});
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('lang');

/****************************** Start Admin Routes ******************************/
Route::Group(['prefix' => 'admin', 'middleware' => ['auth','lang']], function () { 
    //roles
    Route::resource('role', RoleController::class);
    Route::post('roleDelete', [RoleController::class, 'delete'])->name('role.delete');


    //user
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('userDeleteSelected', [UserController::class, 'deleteSelected'])->name('user.deleteSelected');
    Route::get('userShowNotification/{id}', [UserController::class, 'showNotification'])->name('user.showNotification');   
    Route::get('userChangeStatus/{id}', [UserController::class, 'changeStatus'])->name('user.changeStatus');


    //slider
    Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
    Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('slider/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');
    Route::delete('sliderDeleteSelected', [SliderController::class, 'deleteSelected'])->name('slider.deleteSelected');
    Route::get('sliderShowNotification/{id}/{notification_id}', [SliderController::class, 'showNotification'])->name('slider.showNotification');



    //slider-footer
    Route::get('slider-footer', [SliderFooterController::class, 'index'])->name('slider-footer.index');
    Route::post('slider-footer/store', [SliderFooterController::class, 'store'])->name('slider-footer.store');
    Route::get('slider-footer/edit/{id}', [SliderFooterController::class, 'edit'])->name('slider-footer.edit');
    Route::post('slider-footer/update', [SliderFooterController::class, 'update'])->name('slider-footer.update');
    Route::delete('slider-footer/destroy', [SliderFooterController::class, 'destroy'])->name('slider-footer.destroy');
    Route::delete('slider-footerDeleteSelected', [SliderFooterController::class, 'deleteSelected'])->name('slider-footer.deleteSelected');
    Route::get('slider-footerShowNotification/{id}/{notification_id}', [SliderFooterController::class, 'showNotification'])->name('slider-footer.showNotification');



    //who-we-are-detail
    Route::get('who-we-are-detail', [WhoWeAreDetailController::class, 'index'])->name('who-we-are-detail.index');
    Route::post('who-we-are-detail/store', [WhoWeAreDetailController::class, 'store'])->name('who-we-are-detail.store');
    Route::get('who-we-are-detail/edit/{id}', [WhoWeAreDetailController::class, 'edit'])->name('who-we-are-detail.edit');
    Route::post('who-we-are-detail/update', [WhoWeAreDetailController::class, 'update'])->name('who-we-are-detail.update');
    Route::delete('who-we-are-detail/destroy', [WhoWeAreDetailController::class, 'destroy'])->name('who-we-are-detail.destroy');
    Route::delete('who-we-are-detailDeleteSelected', [WhoWeAreDetailController::class, 'deleteSelected'])->name('who-we-are-detail.deleteSelected');
    Route::get('who-we-are-detailShowNotification/{id}/{notification_id}', [WhoWeAreDetailController::class, 'showNotification'])->name('who-we-are-detail.showNotification');



    //who-we-are-side
    Route::get('who-we-are-side', [WhoWeAreSideController::class, 'index'])->name('who-we-are-side.index');
    Route::post('who-we-are-side/store', [WhoWeAreSideController::class, 'store'])->name('who-we-are-side.store');
    Route::get('who-we-are-side/edit/{id}', [WhoWeAreSideController::class, 'edit'])->name('who-we-are-side.edit');
    Route::post('who-we-are-side/update', [WhoWeAreSideController::class, 'update'])->name('who-we-are-side.update');
    Route::delete('who-we-are-side/destroy', [WhoWeAreSideController::class, 'destroy'])->name('who-we-are-side.destroy');
    Route::delete('who-we-are-sideDeleteSelected', [WhoWeAreSideController::class, 'deleteSelected'])->name('who-we-are-side.deleteSelected');
    Route::get('who-we-are-sideShowNotification/{id}/{notification_id}', [WhoWeAreSideController::class, 'showNotification'])->name('who-we-are-side.showNotification');



    //who-we-are-faq
    Route::get('who-we-are-faq', [WhoWeAreFaqController::class, 'index'])->name('who-we-are-faq.index');
    Route::post('who-we-are-faq/store', [WhoWeAreFaqController::class, 'store'])->name('who-we-are-faq.store');
    Route::get('who-we-are-faq/edit/{id}', [WhoWeAreFaqController::class, 'edit'])->name('who-we-are-faq.edit');
    Route::post('who-we-are-faq/update', [WhoWeAreFaqController::class, 'update'])->name('who-we-are-faq.update');
    Route::delete('who-we-are-faq/destroy', [WhoWeAreFaqController::class, 'destroy'])->name('who-we-are-faq.destroy');
    Route::delete('who-we-are-faqDeleteSelected', [WhoWeAreFaqController::class, 'deleteSelected'])->name('who-we-are-faq.deleteSelected');
    Route::get('who-we-are-faqShowNotification/{id}/{notification_id}', [WhoWeAreFaqController::class, 'showNotification'])->name('who-we-are-faq.showNotification');



    //service-detail
    Route::get('service-detail', [ServiceDetailController::class, 'index'])->name('service-detail.index');
    Route::post('service-detail/store', [ServiceDetailController::class, 'store'])->name('service-detail.store');
    Route::get('service-detail/edit/{id}', [ServiceDetailController::class, 'edit'])->name('service-detail.edit');
    Route::post('service-detail/update', [ServiceDetailController::class, 'update'])->name('service-detail.update');
    Route::delete('service-detail/destroy', [ServiceDetailController::class, 'destroy'])->name('service-detail.destroy');
    Route::delete('service-detailDeleteSelected', [ServiceDetailController::class, 'deleteSelected'])->name('service-detail.deleteSelected');
    Route::get('service-detailShowNotification/{id}/{notification_id}', [ServiceDetailController::class, 'showNotification'])->name('service-detail.showNotification');

    

    //service-item
    Route::get('service-item', [ServiceItemController::class, 'index'])->name('service-item.index');
    Route::post('service-item/store', [ServiceItemController::class, 'store'])->name('service-item.store');
    Route::get('service-item/edit/{id}', [ServiceItemController::class, 'edit'])->name('service-item.edit');
    Route::post('service-item/update', [ServiceItemController::class, 'update'])->name('service-item.update');
    Route::delete('service-item/destroy', [ServiceItemController::class, 'destroy'])->name('service-item.destroy');
    Route::delete('service-itemDeleteSelected', [ServiceItemController::class, 'deleteSelected'])->name('service-item.deleteSelected');
    Route::get('service-itemShowNotification/{id}/{notification_id}', [ServiceItemController::class, 'showNotification'])->name('service-item.showNotification');



    //project-detail
    Route::get('project-detail', [ProjectDetailController::class, 'index'])->name('project-detail.index');
    Route::post('project-detail/store', [ProjectDetailController::class, 'store'])->name('project-detail.store');
    Route::get('project-detail/edit/{id}', [ProjectDetailController::class, 'edit'])->name('project-detail.edit');
    Route::post('project-detail/update', [ProjectDetailController::class, 'update'])->name('project-detail.update');
    Route::delete('project-detail/destroy', [ProjectDetailController::class, 'destroy'])->name('project-detail.destroy');
    Route::delete('project-detailDeleteSelected', [ProjectDetailController::class, 'deleteSelected'])->name('project-detail.deleteSelected');
    Route::get('project-detailShowNotification/{id}/{notification_id}', [ProjectDetailController::class, 'showNotification'])->name('project-detail.showNotification');

    

    //project-item
    Route::get('project-item', [ProjectItemController::class, 'index'])->name('project-item.index');
    Route::post('project-item/store', [ProjectItemController::class, 'store'])->name('project-item.store');
    Route::get('project-item/edit/{id}', [ProjectItemController::class, 'edit'])->name('project-item.edit');
    Route::post('project-item/update', [ProjectItemController::class, 'update'])->name('project-item.update');
    Route::delete('project-item/destroy', [ProjectItemController::class, 'destroy'])->name('project-item.destroy');
    Route::delete('project-itemDeleteSelected', [ProjectItemController::class, 'deleteSelected'])->name('project-item.deleteSelected');
    Route::get('project-itemShowNotification/{id}/{notification_id}', [ProjectItemController::class, 'showNotification'])->name('project-item.showNotification');

    

    //course-item
    Route::get('course-item', [CourseItemController::class, 'index'])->name('course-item.index');
    Route::post('course-item/store', [CourseItemController::class, 'store'])->name('course-item.store');
    Route::get('course-item/edit/{id}', [CourseItemController::class, 'edit'])->name('course-item.edit');
    Route::post('course-item/update', [CourseItemController::class, 'update'])->name('course-item.update');
    Route::delete('course-item/destroy', [CourseItemController::class, 'destroy'])->name('course-item.destroy');
    Route::delete('course-itemDeleteSelected', [CourseItemController::class, 'deleteSelected'])->name('course-item.deleteSelected');
    Route::get('course-itemShowNotification/{id}/{notification_id}', [CourseItemController::class, 'showNotification'])->name('course-item.showNotification');



    //course-item-content
    Route::get('course-item-content', [CourseItemContentController::class, 'index'])->name('course-item-content.index');
    Route::post('course-item-content/store', [CourseItemContentController::class, 'store'])->name('course-item-content.store');
    Route::get('course-item-content/edit/{id}', [CourseItemContentController::class, 'edit'])->name('course-item-content.edit');
    Route::post('course-item-content/update', [CourseItemContentController::class, 'update'])->name('course-item-content.update');
    Route::delete('course-item-content/destroy', [CourseItemContentController::class, 'destroy'])->name('course-item-content.destroy');
    Route::delete('course-item-contentDeleteSelected', [CourseItemContentController::class, 'deleteSelected'])->name('course-item-content.deleteSelected');
    Route::get('course-item-contentShowNotification/{id}/{notification_id}', [CourseItemContentController::class, 'showNotification'])->name('course-item-content.showNotification');


    
    //partener
    Route::get('partener', [PartenerController::class, 'index'])->name('partener.index');
    Route::post('partener/store', [PartenerController::class, 'store'])->name('partener.store');
    Route::get('partener/edit/{id}', [PartenerController::class, 'edit'])->name('partener.edit');
    Route::post('partener/update', [PartenerController::class, 'update'])->name('partener.update');
    Route::delete('partener/destroy', [PartenerController::class, 'destroy'])->name('partener.destroy');
    Route::delete('partenerDeleteSelected', [PartenerController::class, 'deleteSelected'])->name('partener.deleteSelected');
    Route::get('partenerShowNotification/{id}/{notification_id}', [PartenerController::class, 'showNotification'])->name('partener.showNotification');



    //company-information
    Route::get('company-information', [CompanyInformationController::class, 'index'])->name('company-information.index');
    Route::post('company-information/store', [CompanyInformationController::class, 'store'])->name('company-information.store');
    Route::get('company-information/edit/{id}', [CompanyInformationController::class, 'edit'])->name('company-information.edit');
    Route::post('company-information/update', [CompanyInformationController::class, 'update'])->name('company-information.update');
    Route::delete('company-information/destroy', [CompanyInformationController::class, 'destroy'])->name('company-information.destroy');
    Route::delete('company-informationDeleteSelected', [CompanyInformationController::class, 'deleteSelected'])->name('company-information.deleteSelected');
    Route::get('company-informationShowNotification/{id}/{notification_id}', [CompanyInformationController::class, 'showNotification'])->name('company-information.showNotification');



    //message
    Route::get('message', [MessageController::class, 'index'])->name('message.index');
    Route::delete('message/destroy', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::delete('messageDeleteSelected', [MessageController::class, 'deleteSelected'])->name('message.deleteSelected');
    Route::get('messageShowNotification/{id}/{notification_id}', [MessageController::class, 'showNotification'])->name('message.showNotification');


    
    //subcription
    Route::get('subcription', [SubcriptionController::class, 'index'])->name('subcription.index');
    Route::post('subcription/store', [SubcriptionController::class, 'store'])->name('subcription.store');
    Route::post('subcription/changeStatus/{id}', [SubcriptionController::class, 'changeStatus'])->name('subcription.changeStatus');

});
/****************************** End Admin Routes ******************************/





/****************************** Start Site Routes ******************************/
Route::Group(['middleware' => ['lang']], function () { 
    Route::get('/', [SiteController::class,'index'])->name('site.index');
    Route::get('projects', [SiteController::class,'projects'])->name('site.projects');
    Route::get('project-item/{name}', [SiteController::class,'projectItem'])->name('site.projectItem');
    Route::get('courses', [SiteController::class,'courses'])->name('site.courses');
    Route::get('course-item/{name}', [SiteController::class,'courseItem'])->name('site.courseItem')->middleware('auth');
    Route::get('course-item-content/{name}', [SiteController::class,'courseItemContent'])->name('site.courseItemContent')->middleware('auth');
    Route::get('contact-us', [SiteController::class,'contactUs'])->name('site.contactUs');
    Route::post('send-message', [SiteController::class, 'sendMessage'])->name('site.send-message');
});
/****************************** End Site Routes ******************************/



//lang routes
Route::prefix('lang')->name('lang.')->group( function () {
    Route::controller(LangController::class)->group( function () {
        Route::get('/ar' ,  'ar')->name('ar');
        Route::get('/en' ,  'en')->name('en');
    });
});

//general routes
Route::get('show_file/{folder_name}/{photo_name}', [GeneralController::class, 'show_file'])->name('show_file');
Route::get('download_file/{folder_name}/{photo_name}', [GeneralController::class, 'download_file'])->name('download_file');
Route::get('allNotifications', [GeneralController::class, 'allNotifications'])->name('allNotifications');
Route::get('markAllAsRead', [GeneralController::class, 'markAllAsRead'])->name('markAllAsRead');