<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CoursePageController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/courses', [CoursePageController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CoursePageController::class, 'show'])->name('courses.show');


/** Cart routes */
Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('add-to-cart/{course}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('auth');
Route::get('remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart')->middleware('auth');

/** Payment Routes */
Route::get('checkout', CheckoutController::class)->name('checkout.index');

Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

/** Stripe Routes */
Route::get('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

Route::get('order-success', [PaymentController::class, 'orderSuccess'])->name('order.success');
Route::get('order-failed', [PaymentController::class, 'orderFailed'])->name('order.failed');

// Route::post('newsletter-subscribe', [FrontendController::class, 'subscribe'])->name('newsletter.subscribe');
/** about route */
// Route::get('about', [FrontendController::class, 'about'])->name('about.index');

/** Contact route */
// Route::get('contact', [FrontendContactController::class, 'index'])->name('contact.index');
// Route::post('contact', [FrontendContactController::class, 'sendMail'])->name('send.contact');

/** Review Routes */
// Route::post('review', [CoursePageController::class, 'storeReview'])->name('review.store');

/** Custom page Routes */
// Route::get('page/{slug}', [FrontendController::class, 'customPage'])->name('custom-page');

/** Blog Routes */
// Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
// Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
// Route::post('blog/comment/{id}', [BlogController::class, 'storeComment'])->name('blog.comment.store');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/instructor.php';
require __DIR__ . '/student.php';
