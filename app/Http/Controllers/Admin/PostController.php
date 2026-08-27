<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $q = trim((string) $request->get('q'));
        $posts = Post::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($inner) use ($q) {
                    $inner->where('title', 'like', "%{$q}%")
                        ->orWhere('slug', 'like', "%{$q}%")
                        ->orWhere('category', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.posts.index', compact('posts', 'q'));
    }

    public function create(): View
    {
        return view('admin.posts.form', ['post' => new Post(['status' => 'draft', 'category' => 'Blog'])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $post = new Post;
        $this->persist($request, $post);

        return redirect()->route('admin.posts.edit', $post)->with('status', 'Post created.');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->persist($request, $post);

        return redirect()->route('admin.posts.edit', $post)->with('status', 'Post saved.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Post deleted.');
    }

    private function persist(Request $request, Post $post): void
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:220'],
            'slug' => ['nullable', 'string', 'max:220'],
            'excerpt' => ['nullable', 'string', 'max:600'],
            'seo_title' => ['nullable', 'string', 'max:70'],
            'seo_description' => ['nullable', 'string', 'max:160'],
            'seo_keywords' => ['nullable', 'string', 'max:220'],
            'body' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:80'],
            'display_date' => ['nullable', 'string', 'max:40'],
            'status' => ['required', 'in:draft,published'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $slug = $data['slug'] ?: Post::makeSlug($data['title'], $post->id);
        $slug = Post::makeSlug(Str::slug($slug) ?: $data['title'], $post->id);

        $body = $this->parseBody($data['body'] ?? '');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $slug.'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/blog'), $name);
            $post->image = 'images/blog/'.$name;
        }

        $post->fill([
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'] ?: Str::limit(strip_tags($data['body'] ?? ''), 220),
            'seo_title' => $data['seo_title'] ?: null,
            'seo_description' => $data['seo_description'] ?: null,
            'seo_keywords' => $data['seo_keywords'] ?: null,
            'body' => $body,
            'category' => $data['category'] ?: 'Blog',
            'display_date' => $data['display_date'] ?: now()->format('M j'),
            'status' => $data['status'],
            'published_at' => $data['status'] === 'published' ? ($post->published_at ?: now()) : $post->published_at,
        ])->save();
    }

    private function parseBody(string $raw): array
    {
        $raw = trim($raw);
        if ($raw === '') {
            return [];
        }

        return collect(preg_split("/\n\s*\n/", $raw) ?: [])
            ->map(fn ($chunk) => trim($chunk))
            ->filter()
            ->map(function (string $chunk) {
                if (str_starts_with($chunk, '# ')) {
                    return ['type' => 'h', 'text' => trim(substr($chunk, 2))];
                }

                return ['type' => 'p', 'text' => $chunk];
            })
            ->values()
            ->all();
    }
}
