<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $comments = BlogComment::latest()->paginate(10);
        return view('admin.blog.comment.index', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $comment = BlogComment::findOrFail($id);
            $comment->delete();
            notyf()->info('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            logger("Social Link Error >> " . $e);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
