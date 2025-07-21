<?php


/**
 * ------------------------------------------------------
 * Instructor Routes
 * ------------------------------------------------------
 */

use App\Http\Controllers\Frontend\CourseContentController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' =>
'instructor.'], function () {
    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');

    /** Profile Routes */
    Route::get('profile', [ProfileController::class, 'instructorIndex'])->name('profile.index');
    Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('profile/update-social', [ProfileController::class, 'updateSocial'])->name('profile.update-social');
    Route::post('profile/update-gateway-info', [
        ProfileController::class,
        'updateGatewayInfo'
    ])->name('profile.update-gateway-info');

    /** Course Routes */
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('courses/create', [CourseController::class, 'storeBasicInfo'])->name('courses.sore-basic-info');
    Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('courses/update', [CourseController::class, 'update'])->name('courses.update');

    Route::get('course-content/{course}/create-chapter', [CourseContentController::class,'createChapterModal'])->name('course-content.create-chapter');
    Route::post('course-content/{course}/create-chapter', [CourseContentController::class,'storeChapter'])->name('course-content.store-chapter');
    Route::get('course-content/{chapter}/edit-chapter', [CourseContentController::class,'editChapterModal'])->name('course-content.edit-chapter');
    Route::post('course-content/{chapter}/edit-chapter', [CourseContentController::class,'updateChapterModal'])->name('course-content.update-chapter');
    Route::delete('course-content/{chapter}/chapter', [CourseContentController::class,'destroyChapter'])->name('course-content.destory-chapter');

    Route::get('course-content/create-lesson', [CourseContentController::class,'createLesson'])->name('course-content.create-lesson');
    Route::post('course-content/create-lesson', [CourseContentController::class,'storeLesson'])->name('course-content.store-lesson');

    Route::get('course-content/edit-lesson', [CourseContentController::class,'editLesson'])->name('course-content.edit-lesson');
    Route::post('course-content/{id}/update-lesson', [CourseContentController::class,'updateLesson'])->name('course-content.update-lesson');
    Route::delete('course-content/{id}/lesson', [CourseContentController::class,'destroyLesson'])->name('course-content.destroy-lesson');

    Route::post('course-chapter/{chapter}/sort-lesson', [CourseContentController::class,'sortLesson'])->name('course-chapter.sort-lesson');
    Route::get('course-content/{course}/sort-chapter', [CourseContentController::class,'sortChapter'])->name('course-content.sort-chpater');
    Route::post('course-content/{course}/sort-chapter', [CourseContentController::class,'updateSortChapter'])->name('course-content.update-sort-chpater');


    /** Orders Routes */
    // Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    /** Withdrawal routes */
    // Route::get('withdrawals', [WithdrawController::class, 'index'])->name('withdraw.index');
    // Route::get('withdrawals/request-payout', [
    //     WithdrawController::class,
    //     'requestPayoutIndex'
    // ])->name('withdraw.request-payout');
    // Route::post('withdrawals/request-payout', [
    //     WithdrawController::class,
    //     'requestPayout'
    // ])->name('withdraw.request-payout.create');







    /** lfm Routes */
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
