<?php

/**
 * ------------------------------------------------------
 * Student Routes
 * ------------------------------------------------------
 */

use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    // Route::get('/become-instructor', [StudentDashboardController::class, 'becomeInstructor'])->name('become-instructor');
    // Route::post('/become-instructor/{user}', [StudentDashboardController::class, 'becomeInstructorUpdate'])->name('become-instructor.update');

    /** Profile Routes */
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('profile/update-social', [ProfileController::class, 'updateSocial'])->name('profile.update-social');

    /** Enroll Courses Routes */
    // Route::get('enrolled-courses', [EnrolledCourseController::class, 'index'])->name('enrolled-courses.index');
    // Route::get('course-player/{slug}', [EnrolledCourseController::class, 'payerIndex'])->name('course-player.index');
    // Route::get('get-lesson-content', [EnrolledCourseController::class, 'getLessonContent'])->name('get-lesson-content');
    // Route::post('update-watch-history', [EnrolledCourseController::class, 'updateWatchHistory'])->name('update-watch-history');
    // Route::post('update-lesson-completion', [EnrolledCourseController::class, 'updateLessonCompletion'])->name('update-lesson-completion');
    // Route::get('file-download/{id}', [EnrolledCourseController::class, 'fileDownload'])->name('file-download');

    /** Certificate Routes */
    // Route::get('certificate/{course}/download', [CertificateController::class, 'download'])->name('certificate.download');

    /** Review Routes */
    // Route::get('review', [StudentDashboardController::class, 'review'])->name('review.index');
    // Route::delete('review/{id}', [StudentDashboardController::class, 'reviewDestroy'])->name('review.destroy');

    // Route::get('orders', [StudentOrderController::class, 'index'])->name('orders.index');
    // Route::get('orders/{order}', [StudentOrderController::class, 'show'])->name('orders.show');
});