<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Post;
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
            'authorsServices' => [
                'Copyediting & Proofreading',
                'Book Translation',
                'Book Writing',
                'Book Promotional Blogs',
                'Author Website Content & Design',
                'LinkedIn Strategic Content',
            ],
            'brandServices' => [
                'Website Content + Development',
                'SEO + AEO Blogs',
                'LinkedIn Ghostwriting',
                'Thought Leadership & Ghostwriting',
                'Copyediting & Editorial Support',
            ],
        ]);
    }

    public function work(): View
    {
        return view('pages.work', ['workItems' => $this->workItems()]);
    }

    public function workShow(string $slug): View
    {
        $work = collect($this->workItems())->firstWhere('slug', $slug);
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
        $post = Post::query()->published()->where('slug', $slug)->first();
        abort_unless($post, 404);
        $post->increment('views');
        $insight = $post->fresh()->toPublicArray();

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
        ]);
    }

    private function workItems(): array
    {
        return [
            [
                'slug' => 'kiran-lasiyal',
                'title' => "How Strategic Social Media Editing Transformed Kiran's LinkedIn Journey",
                'category' => 'Case study',
                'client' => 'Kiran Lasiyal',
                'role' => 'Social Media Manager & video editor',
                'text' => 'A tale of exceptional growth',
                'image' => 'images/work/kiran.jpg',
                'result' => 'Post impressions up 26% in a week. Followers up 9.3%. Final copy delivered in 20 hours with no revisions.',
            ],
        ];
    }

    private function insightItems(): array
    {
        $fromDb = Post::query()->published()->latest('published_at')->latest()->get();
        if ($fromDb->isNotEmpty()) {
            return $fromDb->map->toPublicArray()->all();
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
