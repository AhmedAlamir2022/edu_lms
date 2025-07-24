<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    function index(): View
    {
        $userCourses = user()->enrollments()->count();
        $reviewCount = Review::where('user_id', user()->id)->count();
        $orderCount = Order::where('buyer_id', user()->id)->count();

        $orders = Order::where('buyer_id', user()->id)->take(10)->get();

        return view('frontend.student-dashboard.index', compact('orderCount', 'orders', 'userCourses', 'reviewCount'));
    }

    function review(): View
    {
        $reviews = Review::where('user_id', user()->id)->paginate(10);
        return view('frontend.student-dashboard.review.index', compact('reviews'));
    }

    function reviewDestroy(string $id)
    {
        try {
            $review = Review::where('id', $id)->where('user_id', user()->id)->firstOrFail();
            $review->delete();
            notyf()->info('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            logger("Review Error >> " . $e);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
