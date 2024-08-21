<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CourseItemCheckSubscription
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
        $courseName = $request->route('name'); // Assuming the course ID is passed in the route
        $courseId   = \App\Models\CourseItem::where('name_ar', $courseName)->orWhere('name_en', $courseName)->first();
        $user       = auth()->user();

        // If the user is one of the admins
        if ($user && $user->roles_name != null)
        {
            return redirect()->route('home');
        }
        // Check if the user is subscribed to the course
        else if ($user && $user->isSubscribedToCourse($courseId)) {
            return $next($request);
        }
        // If not subscribed, redirect to a specific page
        else
        {
            return redirect()->route('site.courses')->with('error', __('main.You need to subscribe to access this course.'));
        }
    }
}
