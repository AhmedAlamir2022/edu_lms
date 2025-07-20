<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InstructorRequestApprovedMail;
use App\Mail\InstructorRequestRejectMail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InstructorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $instructorsRequests = User::where('role', 'instructor')
            ->whereIn('approve_status', ['pending', 'rejected'])
            ->get();
        return view('admin.instructor-request.index', compact('instructorsRequests'));
    }

    public function download(User $user)
    {
        $filePath = public_path($user->document); // مثال: public/uploads/cv_123.pdf

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $instructor_request): RedirectResponse
    {
        $request->validate(['status' => ['required', 'in:approved,rejected,pending']]);
        $instructor_request->approve_status = $request->status;
        $request->status == 'approved' ? $instructor_request->role = 'instructor' : "";
        $instructor_request->save();

        self::sendNotification($instructor_request);

        return redirect()->back();
    }

    public static function sendNotification($instructor_request): void
    {
        switch ($instructor_request->approve_status) {
            case 'approved':
                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor_request->email)->queue(new InstructorRequestApprovedMail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestApprovedMail());
                }
                break;
            case 'rejected':

                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor_request->email)->queue(new InstructorRequestRejectMail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestRejectMail());
                }
        }
    }
}