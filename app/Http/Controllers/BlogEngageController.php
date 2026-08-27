<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogEngageController extends Controller
{
    public function like(Request $request, string $slug): JsonResponse
    {
        $post = Post::query()->published()->where('slug', $slug)->firstOrFail();
        $key = $this->guestKey($request);

        $existing = PostLike::query()->where('post_id', $post->id)->where('guest_key', $key)->first();

        if ($existing) {
            $existing->delete();
            $post->decrement('likes_count');
            $liked = false;
        } else {
            PostLike::query()->create(['post_id' => $post->id, 'guest_key' => $key]);
            $post->increment('likes_count');
            $liked = true;
        }

        $post->refresh();

        return response()->json([
            'liked' => $liked,
            'likes' => Post::publicCount($post->slug, 'likes') + ($liked ? 1 : 0),
            'comments' => Post::publicCount($post->slug, 'comments'),
            'shares' => Post::publicCount($post->slug, 'shares'),
            'views' => (int) $post->views,
        ]);
    }

    public function comments(string $slug): JsonResponse
    {
        $post = Post::query()->published()->where('slug', $slug)->firstOrFail();

        $liked = PostLike::query()->where('post_id', $post->id)->where('guest_key', $this->guestKey(request()))->exists();

        return response()->json([
            'comments' => $post->approvedComments()->get()->map(fn (Comment $c) => [
                'name' => $c->author_name,
                'text' => $c->body,
                'date' => optional($c->created_at)->format('j M'),
            ]),
            'likes' => Post::publicCount($post->slug, 'likes') + ($liked ? 1 : 0),
            'comment_count' => Post::publicCount($post->slug, 'comments'),
            'shares' => Post::publicCount($post->slug, 'shares'),
            'views' => (int) $post->views,
            'liked' => $liked,
        ]);
    }

    public function comment(Request $request, string $slug): JsonResponse
    {
        $post = Post::query()->published()->where('slug', $slug)->firstOrFail();
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:80'],
            'comment' => ['required', 'string', 'max:280'],
        ]);

        $comment = $post->comments()->create([
            'author_name' => $data['name'] ?: 'Guest',
            'body' => $data['comment'],
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        return response()->json([
            'ok' => true,
            'pending' => true,
            'comment' => null,
            'comments' => Post::publicCount($post->slug, 'comments'),
            'likes' => Post::publicCount($post->slug, 'likes'),
            'shares' => Post::publicCount($post->slug, 'shares'),
            'views' => (int) $post->views,
        ]);
    }

    private function guestKey(Request $request): string
    {
        $key = $request->session()->get('lw_guest_key');
        if (! $key) {
            $key = bin2hex(random_bytes(16));
            $request->session()->put('lw_guest_key', $key);
        }

        return $key;
    }
}
