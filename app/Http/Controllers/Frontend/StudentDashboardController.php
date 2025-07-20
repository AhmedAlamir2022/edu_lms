<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    function index() : View {
        // $userCourses = user()->enrollments()->count();
        // $reviewCount = Review::where('user_id', user()->id)->count();
        // $orderCount = Order::where('buyer_id', user()->id)->count();

        // $orders = Order::where('buyer_id', user()->id)->take(10)->get();

        return view('frontend.student-dashboard.index');
    }
}