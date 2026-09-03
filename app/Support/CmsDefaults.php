<?php

namespace App\Support;

class CmsDefaults
{
    public static function homeTestimonials(): array
    {
        return [
            ['quote' => 'I just finished going over chapter one! Thank you so much for your input, I used quite a few of your suggestions. I want to say probably about 85% of them. Thank you for reviewing this for me.', 'name' => 'Eve Miller', 'role' => 'Author', 'avatar' => 'images/shruti-founder.jpg'],
            ['quote' => 'Shruti worked with us on proofreading our product notes and a few blogs. She is a thorough professional, punctual with deadlines, and most importantly an expert in her field. We wish you all the best for all your future endeavors.', 'name' => 'Paintphotographs', 'role' => 'Client', 'avatar' => 'images/shruti-hero.png'],
            ['quote' => 'Shruti has been working as a reviewer in my team for more than 2.5 years. she is a team player and has a very good command over the language, on time delivery, accuracy, high standard work ethics are some of her bright qualities. She is an asset to any team she works for.', 'name' => 'Rushabh Shah', 'role' => 'Client', 'avatar' => 'images/shruti-founder.jpg'],
        ];
    }

    public static function servicesTestimonials(): array
    {
        return [
            [
                'intro' => 'I found the strategy session useful because I learnt:',
                'bullets' => [
                    'How important niching down is.',
                    'How to clearly define my client’s needs so my content reflects their real struggles.',
                    'How outreach actually works on LinkedIn.',
                ],
                'outro' => 'I’m using my own content system, but the outside perspective helped me see new ways to reach potential clients and create content that is relevant to anxiety and therapy/mental health.',
                'name' => 'Tanya Geddes, MSc',
                'role' => 'Integrative Psychotherapist',
                'meta' => 'May 4, 2026 · Client',
            ],
            [
                'quote' => 'I have been working with Shruti for almost 8 years and she has delivered great value. She has helped me in writing new content, editing as well as proofreading. Her grip on language is very powerful with keen eyes on proofreading too. Apart from the work, I appreciate her work ethics and excellent communication skills. I highly recommend her to add value to your project.',
                'name' => 'Mitesh Mandaliya',
                'role' => 'Gujarati Linguist',
                'meta' => 'November 22, 2025 · Worked on the same team',
            ],
        ];
    }

    public static function servicesList(): array
    {
        return [
            ['audience' => 'Authors', 'title' => 'Ghostwriting', 'href' => '/services/authors#ghostwriting'],
            ['audience' => 'Authors', 'title' => 'Book Promotional Blogs', 'href' => '/services/authors'],
            ['audience' => 'Authors', 'title' => 'Copyediting & Proofreading', 'href' => '/services/authors#copyediting'],
            ['audience' => 'Brands', 'title' => 'Website Content + Development', 'href' => '/services/brands'],
            ['audience' => 'Brands', 'title' => 'SEO + AEO Blogs', 'href' => '/services/brands'],
            ['audience' => 'Brands', 'title' => 'LinkedIn Ghostwriting', 'href' => '/services/brands'],
            ['audience' => 'Brands', 'title' => 'Thought Leadership & Ghostwriting', 'href' => '/services/brands'],
            ['audience' => 'Brands', 'title' => 'Copyediting & Editorial Support', 'href' => '/services/brands'],
        ];
    }

    public static function homeInsights(): array
    {
        return [
            ['title' => 'Why Hiring an Editor is an Investment, Not a Cost for Authors?', 'text' => 'Editing isn’t an extra cost. It’s what gets your book read.', 'image' => 'images/blog/why-hiring-an-editor-is-an-investment-no.jpg', 'href' => '/blog/why-hiring-an-editor-is-an-investment-not-a-cost-for-authors'],
            ['title' => 'How to Hire a Proofreader for Your Book: Cost, Checklist & Red Flags', 'text' => 'Learn how to shortlist, compare costs, and avoid mistakes, especially on a budget.', 'image' => 'images/blog/how-to-hire-a-proofreader-for-your-book-.jpg', 'href' => '/blog/how-to-hire-a-proofreader-for-your-book-cost-checklist-red-flags'],
            ['title' => 'Should You Invest in Book Editing and Proofreading?', 'text' => 'If you want to avoid negative reader reviews, the answer is yes.', 'image' => 'images/blog/should-you-invest-in-book-editing-and-pr.jpg', 'href' => '/blog/should-you-invest-in-book-editing-and-proofreading-costs-tips-for-new-authors'],
            ['title' => 'How to Turn Your Blog into an Ebook in 2025', 'text' => 'Includes free template and checklists to help you build your ebook.', 'image' => 'images/blog/how-to-turn-your-blog-into-an-ebook-in-2.jpg', 'href' => '/blog/how-to-turn-your-blog-into-an-ebook-in-2025-with-free-content-audit-template-and'],
        ];
    }

    public static function workItems(): array
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

    public static function selectedWork(): array
    {
        return [
            ['title' => "How Strategic Social Media Editing Transformed Kiran's LinkedIn Journey", 'text' => 'A tale of exceptional growth — 26% more impressions in a week.', 'image' => 'images/work/kiran.jpg', 'href' => '/work'],
        ];
    }

    public static function homeSection(string $key): array
    {
        return match ($key) {
            'featured_services' => [
                ['title' => 'Editorial & Content Strategy', 'text' => 'Strategic content planning that aligns with your goals and speaks to your audience clearly.', 'href' => '/services', 'icon' => 'edit'],
                ['title' => 'SEO Content & Copywriting', 'text' => 'Human-written, SEO-friendly content that ranks on search engines and resonates with real people.', 'href' => '/services/brands', 'icon' => 'search'],
                ['title' => 'Digital PR & Outreach', 'text' => 'We help you earn mentions, backlinks, and visibility from credible publications that move the needle.', 'href' => '/services/brands', 'icon' => 'spark'],
                ['title' => 'Author & Book Marketing', 'text' => 'End-to-end support from manuscript to market — because every great book deserves to be discovered.', 'href' => '/services/authors', 'icon' => 'book'],
            ],
            'audience_cards' => [
                [
                    'title' => 'For Authors & Publishers',
                    'kicker' => 'Indie authors · Publishing houses · Literary agents · Academics',
                    'description' => "You've written something worth reading. We make sure the right readers can find it — and that it's publication-ready when they do.",
                    'href' => '/services/authors',
                    'cta' => 'See Author Services',
                    'tone' => 'teal',
                    'image' => 'images/audience-authors-desk.png',
                    'imageAlt' => "Stack of books, notebook and pen on a writer's desk",
                    'icon' => 'book',
                    'highlights' => ['Ghostwriting · Book Promotional Blogs · Copyediting · Proofreading · Publishing Guidance · Translation'],
                ],
                [
                    'title' => 'For Coaches, Brands & Businesses',
                    'kicker' => 'Coaches · Consultants · Therapists · Financial advisors · Entrepreneurs',
                    'description' => "You've built expertise worth paying for. We make sure your content reflects it — and that your ideal clients find you before they find someone else.",
                    'href' => '/services/brands',
                    'cta' => 'See Brand Services',
                    'tone' => 'mauve',
                    'image' => 'images/audience-brands-desk.png',
                    'imageAlt' => 'Laptop, notebook and coffee on a professional desk',
                    'icon' => 'briefcase',
                    'highlights' => ['Website Content + Dev · SEO + AEO Blogs · LinkedIn Ghostwriting · Thought Leadership'],
                ],
            ],
            'problems' => [
                "My website doesn't represent what I actually do.",
                'I have a book in my head but no idea how to get it out.',
                "I'm not showing up on Google — or anywhere.",
                'My content is written — it just needs someone to sharpen it.',
                'My LinkedIn is either inconsistent or completely silent.',
            ],
            'process_steps' => [
                ['number' => '01', 'title' => 'Discover', 'text' => 'We understand your goals, audience and ambitions.', 'icon' => 'chat'],
                ['number' => '02', 'title' => 'Research', 'text' => 'We dive deep into data, insights and opportunities.', 'icon' => 'search'],
                ['number' => '03', 'title' => 'Create', 'text' => 'We craft compelling content that connects and converts.', 'icon' => 'edit'],
                ['number' => '04', 'title' => 'Optimise', 'text' => 'We refine for SEO, readability and impact.', 'icon' => 'spark'],
                ['number' => '05', 'title' => 'Deliver', 'text' => 'We deliver on time and measure what matters.', 'icon' => 'check'],
            ],
            'why_blocks' => [
                ['title' => 'Human-written. Always.', 'icon' => 'edit', 'description' => "Every word is written by hand — researched, considered, and crafted for your specific audience. No AI-generated filler. No recycled frameworks. Content that sounds like you, and works for the people you're trying to reach."],
                ['title' => 'Content + development together', 'icon' => 'website', 'description' => 'Website copy and website build under one engagement. No brief lost between a writer and a developer. No misaligned design and messaging. Everything built in the same time, for the same audience.'],
                ['title' => 'Research is the foundation', 'icon' => 'search', 'description' => "An M.Phil in Management and 9+ years of professional experience across finance, technology, and education means we understand the fields we work in. We don't just write about your expertise. We understand it."],
                ['title' => '5–10 clients. Full attention.', 'icon' => 'check', 'description' => "We deliberately limit how many clients we take on. Not because we can't handle more — but because your brand deserves focus, not a queue. When you work with Linking Wordz, you are not a ticket number."],
            ],
            default => [],
        };
    }

    public static function portfolioItems(): array
    {
        return [];
    }

    public static function contact(string $key): ?string
    {
        return match ($key) {
            'email' => 'hello@linkingwordz.com',
            'connect_email' => 'connect@linkingwordz.com',
            'phone' => '+91 9901230875',
            'whatsapp' => '919901230875',
            'address' => 'Ahmedabad, Gujarat, India',
            'instagram' => 'https://www.instagram.com/linkingwordz/',
            'facebook' => 'https://www.facebook.com/linkingwordz',
            'linkedin' => 'https://www.linkedin.com/company/linkingwordz',
            default => null,
        };
    }
}
