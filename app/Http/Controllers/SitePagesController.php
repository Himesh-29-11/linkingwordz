<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Post;
use App\Support\Cms;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SitePagesController extends Controller
{
    public function about(): View
    {
        return view('pages.about', [
            'instagramPosts' => [
                [
                    'type' => 'image',
                    'src' => 'images/about/about-post-1.png',
                    'href' => 'https://www.instagram.com/linkingwordz/',
                    'alt' => 'Linkingwordz Instagram post',
                ],
                [
                    'type' => 'image',
                    'src' => 'images/about/about-post-2.png',
                    'href' => 'https://www.instagram.com/p/C2SB8oeRUd3/',
                    'alt' => 'Linkingwordz Instagram post',
                ],
                [
                    'type' => 'image',
                    'src' => 'images/about/about-post-3.png',
                    'href' => 'https://www.instagram.com/p/CzbKRY_samg/',
                    'alt' => 'Linkingwordz Instagram post',
                ],
                [
                    'type' => 'video',
                    'src' => 'videos/about-reel-1.mp4',
                    'poster' => 'videos/about-reel-1.jpg',
                    'href' => 'https://www.instagram.com/linkingwordz/',
                    'alt' => 'Linkingwordz Instagram reel',
                ],
                [
                    'type' => 'video',
                    'src' => 'videos/about-reel-2.mp4',
                    'poster' => 'videos/about-reel-2.jpg',
                    'href' => 'https://www.instagram.com/linkingwordz/',
                    'alt' => 'Linkingwordz Instagram reel',
                ],
            ],
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'testimonials' => Cms::servicesTestimonials(),
        ]);
    }

    public function portfolio(): View
    {
        return view('pages.portfolio', [
            'portfolioItems' => Cms::portfolioItems(),
        ]);
    }

    public function work(): View
    {
        return view('pages.work', ['workItems' => Cms::workItems()]);
    }

    public function workShow(string $slug): View
    {
        $work = collect(Cms::workItems())->firstWhere('slug', $slug);
        abort_unless($work, 404);

        return view('pages.work-show', compact('work'));
    }

    public function insights(): View
    {
        $insights = $this->insightItems();
        $q = trim((string) request('q'));
        if ($q !== '') {
            $insights = array_values(array_filter($insights, function (array $item) use ($q) {
                return str_contains(mb_strtolower($item['title'].' '.$item['text']), mb_strtolower($q));
            }));
        }

        return view('pages.insights', ['insights' => $insights]);
    }

    public function insightShow(string $slug): View
    {
        try {
            $post = Post::query()->published()->where('slug', $slug)->first();
        } catch (\Throwable) {
            $post = null;
        }

        if ($post) {
            $post->increment('views');
            $insight = $post->fresh()->toPublicArray();
            $insight['comment_list'] = $post->approvedComments()
                ->get()
                ->map(fn ($c) => [
                    'name' => $c->author_name,
                    'text' => $c->body,
                    'date' => optional($c->created_at)->format('j M'),
                ])
                ->all();

            return view('pages.insight-show', compact('insight'));
        }

        $insight = collect($this->insightItems())->firstWhere('slug', $slug);
        abort_unless($insight, 404);
        $insight['comment_list'] = $insight['comment_list'] ?? [];

        return view('pages.insight-show', compact('insight'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['nullable', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['nullable', 'string', 'max:3000'],
        ]);

        Inquiry::query()->create($data);

        return redirect()->route('contact')->with('contact_success', 'Thank you. Your message is ready for review. We will be in touch soon.');
    }

    public function legal(string $page): View
    {
        abort_unless(in_array($page, ['privacy-policy', 'terms-and-conditions'], true), 404);

        return view('pages.legal', [
            'title' => $page === 'privacy-policy' ? 'Privacy Policy' : 'Terms & Conditions',
            'page' => $page,
            'body' => Cms::pageBody($page),
        ]);
    }

    private function insightItems(): array
    {
        try {
            $fromDb = Post::query()->published()->latest('published_at')->latest()->get();
            if ($fromDb->isNotEmpty()) {
                return $fromDb->map->toPublicArray()->all();
            }
        } catch (\Throwable) {
            // Fall back to JSON when DB tables are missing or unreachable.
        }

        $path = database_path('blog-posts.json');
        $items = json_decode((string) file_get_contents($path), true) ?: [];

        return array_map(function (array $item) {
            $body = $item['body'] ?? [];
            if ($body === []) {
                $body = [['type' => 'p', 'text' => $item['text'] ?? '']];
            }

            $item['body'] = $body;
            $item['category'] = $item['category'] ?? 'Blog';
            $item['likes'] = Post::publicCount($item['slug'], 'likes');
            $item['comments'] = Post::publicCount($item['slug'], 'comments');
            $item['shares'] = Post::publicCount($item['slug'], 'shares');

            return $item;
        }, $items);
    }
}
