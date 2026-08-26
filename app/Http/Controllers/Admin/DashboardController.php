<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Inquiry;
use App\Models\Post;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Published posts', 'value' => Post::query()->published()->count(), 'hint' => 'Live on the journal'],
                ['label' => 'Drafts', 'value' => Post::query()->where('status', 'draft')->count(), 'hint' => 'Waiting to go live'],
                ['label' => 'Pending comments', 'value' => Comment::query()->where('status', 'pending')->count(), 'hint' => 'Need a review'],
                ['label' => 'New inquiries', 'value' => Inquiry::query()->where('status', 'new')->count(), 'hint' => 'From the contact form'],
                ['label' => 'Total likes', 'value' => (int) Post::query()->sum('likes_count'), 'hint' => 'Across all posts'],
                ['label' => 'Total views', 'value' => (int) Post::query()->sum('views'), 'hint' => 'Article opens'],
            ],
            'recentPosts' => Post::query()->latest()->take(5)->get(),
            'recentComments' => Comment::query()->with('post')->latest()->take(6)->get(),
            'recentInquiries' => Inquiry::query()->latest()->take(5)->get(),
        ]);
    }
}
