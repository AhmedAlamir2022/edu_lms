<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(): View
    {
        //   $hero = Hero::first();
        //   $feature = Feature::first();
        $featuredCategories = CourseCategory::withCount(['subCategories as active_course_count' => function ($query) {
            $query->whereHas('courses', function ($query) {
                $query->where(['is_approved' => 'approved', 'status' => 'active']);
            });
        }])->where(['parent_id' => null, 'show_at_trending' => 1])->limit(12)->get();

        //   $about = AboutUsSection::first();

        // $latestCourses = LatestCourseSection::first();
        //   $becomeInstructorBanner = BecomeInstructorSection::first();
        //   $video = VideoSection::first();
        //   $brands = Brand::where('status', 1)->get();
        //   $featuredInstructor = FeaturedInstructor::first();
        //   $featuredInstructorCourses = Course::whereIn('id', json_decode($featuredInstructor?->featured_courses ?? '[]'))->get();
        //   $testimonials = Testimonial::all();
        //   $blogs = Blog::where('status', 1)->latest()->limit(3)->get();

        return view('frontend.pages.home.index', compact('featuredCategories'));
    }
}
