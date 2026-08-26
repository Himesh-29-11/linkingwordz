<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(Request $request): View
    {
        $status = (string) $request->get('status', 'all');
        $comments = Comment::query()
            ->with('post')
            ->when(in_array($status, ['pending', 'approved', 'spam'], true), fn ($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.comments.index', compact('comments', 'status'));
    }

    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,approved,spam'],
        ]);
        $comment->update($data);

        return back()->with('status', 'Comment updated.');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return back()->with('status', 'Comment removed.');
    }
}
