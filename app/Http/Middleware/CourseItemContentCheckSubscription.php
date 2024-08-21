<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CourseItemContentCheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $courseName     = $request->route('name'); // Assuming the course ID is passed in the route
        $courseItemName = \App\Models\CourseItemContent::where('name_ar', $courseName)->orWhere('name_en', $courseName)->first();
        $courseId       = \App\Models\CourseItem::where('id', $courseItemName->course_item_id)->first();
        $user           = auth()->user();

        // Check if the user is subscribed to the course
        if ($user && $user->isSubscribedToCourse($courseId)) {
            return $next($request);
        }

        // If not subscribed, redirect to a specific page
        return redirect()->route('site.courses')->with('error', __('main.You need to subscribe to access this course.'));
    }
}