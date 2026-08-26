<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SitePagesController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
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
        return view('pages.insights', ['insights' => $this->insightItems()]);
    }

    public function insightShow(string $slug): View
    {
        $insight = collect($this->insightItems())->firstWhere('slug', $slug);
        abort_unless($insight, 404);

        return view('pages.insight-show', compact('insight'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

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
        return [
            [
                'slug' => 'content-that-ranks',
                'title' => 'How to Write Content That Ranks and Converts',
                'category' => 'SEO & Content',
                'text' => 'Practical tips to create content that works for search engines and real people.',
                'image' => 'images/audience-authors-desk.png',
                'body' => [
                    'Content that ranks is not written for algorithms alone. It starts with a real question, a useful answer, and a clear understanding of the person searching.',
                    'The strongest pages combine search intent with editorial judgment: a focused topic, a helpful structure, language people actually use, and a next step that feels natural.',
                    'When every paragraph earns its place, content becomes more than traffic. It becomes a reason for the right reader to trust you.',
                ],
            ],
            [
                'slug' => 'editorial-storytelling',
                'title' => 'The Power of Editorial Storytelling for Brands',
                'category' => 'Brand Voice',
                'text' => 'Why storytelling builds trust and how to use it the right way.',
                'image' => 'images/audience-brands-desk.png',
                'body' => [
                    'A brand story is not a performance. It is the clearest explanation of why your work matters and who it is designed to help.',
                    'Editorial storytelling gives expertise a shape people can remember. It turns features into meaning, services into outcomes, and information into connection.',
                    'The goal is not to make every message dramatic. It is to make every message human, specific, and worth passing on.',
                ],
            ],
            [
                'slug' => 'digital-pr-vs-link-building',
                'title' => "Digital PR vs Link Building: What's the Difference?",
                'category' => 'Digital PR',
                'text' => 'A clear breakdown of how each approach can grow your authority.',
                'image' => 'images/shruti-hero.png',
                'body' => [
                    'Link building focuses on earning links that strengthen a website’s authority. Digital PR starts with the bigger story: why a publication, journalist, or audience should care.',
                    'The two can work together, but they are not interchangeable. One is a search tactic; the other is an authority-building practice that can create attention, trust, and links as a result.',
                    'The best approach is built around useful ideas and credible evidence, not a list of links pursued in isolation.',
                ],
            ],
            [
                'slug' => 'book-marketing-2026',
                'title' => 'Book Marketing in 2026: What Authors Should Know',
                'category' => 'Publishing',
                'text' => 'Strategies that help authors get noticed in a crowded market.',
                'image' => 'images/shruti-founder.jpg',
                'body' => [
                    'A book launch is no longer a single announcement. Readers discover authors through repeated, useful encounters across search, social platforms, newsletters, and communities.',
                    'That means the author’s online presence should support the book before, during, and after launch: a clear website, a discoverable body of content, and a voice readers recognise.',
                    'Good marketing does not replace a good book. It helps the right readers find it.',
                ],
            ],
        ];
    }
}
