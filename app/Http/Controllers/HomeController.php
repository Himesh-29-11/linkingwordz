<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'trustStats' => [
                ['label' => '9+ Years Experience', 'detail' => 'Linguistics, content & writing', 'icon' => 'badge'],
                ['label' => 'M.Phil in Management', 'detail' => 'Research-led editorial work', 'icon' => 'graduate'],
                ['label' => 'Core Expertise', 'detail' => 'Finance · Technology · Education', 'icon' => 'layers'],
                ['label' => '5–10 Clients at a Time', 'detail' => 'Personal attention, not a queue', 'icon' => 'people'],
            ],
            'featuredServices' => [
                ['title' => 'Editorial & Content Strategy', 'text' => 'Strategic content planning that aligns with your goals and speaks to your audience clearly.', 'href' => '/services', 'icon' => 'edit'],
                ['title' => 'SEO Content & Copywriting', 'text' => 'Human-written, SEO-friendly content that ranks on search engines and resonates with real people.', 'href' => '/services/brands', 'icon' => 'search'],
                ['title' => 'Digital PR & Outreach', 'text' => 'We help you earn mentions, backlinks, and visibility from credible publications that move the needle.', 'href' => '/services/brands', 'icon' => 'spark'],
                ['title' => 'Author & Book Marketing', 'text' => 'End-to-end support from manuscript to market — because every great book deserves to be discovered.', 'href' => '/services/authors', 'icon' => 'book'],
            ],
            'services' => [
                ['audience' => 'Authors', 'title' => 'Ghostwriting', 'href' => '/services/authors#ghostwriting'],
                ['audience' => 'Authors', 'title' => 'Book Promotional Blogs', 'href' => '/services/authors'],
                ['audience' => 'Authors', 'title' => 'Copyediting & Proofreading', 'href' => '/services/authors#copyediting'],
                ['audience' => 'Brands', 'title' => 'Website Content + Development', 'href' => '/services/brands'],
                ['audience' => 'Brands', 'title' => 'SEO + AEO Blogs', 'href' => '/services/brands'],
                ['audience' => 'Brands', 'title' => 'LinkedIn Ghostwriting', 'href' => '/services/brands'],
                ['audience' => 'Brands', 'title' => 'Thought Leadership & Ghostwriting', 'href' => '/services/brands'],
                ['audience' => 'Brands', 'title' => 'Copyediting & Editorial Support', 'href' => '/services/brands'],
            ],
            'testimonials' => [
                ['quote' => 'Linkingwordz understood our book better than we did. The launch strategy was brilliant!', 'name' => 'Ananya S.', 'role' => 'Author', 'avatar' => 'images/shruti-founder.jpg'],
                ['quote' => 'Our organic traffic doubled and our content finally sounds like us. Highly recommend!', 'name' => 'Rohit M.', 'role' => 'Marketing Head', 'avatar' => 'images/shruti-hero.png'],
                ['quote' => "Professional, insightful and dependable. They're our go-to content partner.", 'name' => 'Neha T.', 'role' => 'Founder', 'avatar' => 'images/shruti-founder.jpg'],
            ],
            'selectedWork' => [
                ['title' => 'Book Launch Campaign for Norwood Press', 'text' => 'Multi-channel campaign that drove pre-orders and media coverage.', 'image' => 'images/audience-authors-desk.png', 'href' => '/work/norwood-press'],
                ['title' => 'SEO Content Strategy for FinTech Brand', 'text' => 'Increased organic traffic by 166% in 3 months.', 'image' => 'images/audience-brands-desk.png', 'href' => '/work/fintech-brand'],
                ['title' => 'Digital PR for SaaS Company', 'text' => 'Earned 42 high-authority backlinks and top-tier media mentions.', 'image' => 'images/shruti-hero.png', 'href' => '/work/saas-company'],
                ['title' => 'Editorial Overhaul for Education Platform', 'text' => 'Improved engagement, rankings and lead generation.', 'image' => 'images/shruti-founder.jpg', 'href' => '/work/education-platform'],
            ],
            'insights' => [
                ['title' => 'How to Write Content That Ranks and Converts', 'text' => 'Practical tips to create content that works for search engines and real people.', 'image' => 'images/audience-authors-desk.png', 'href' => '/insights/content-that-ranks'],
                ['title' => 'The Power of Editorial Storytelling for Brands', 'text' => 'Why storytelling builds trust and how to use it the right way.', 'image' => 'images/audience-brands-desk.png', 'href' => '/insights/editorial-storytelling'],
                ['title' => "Digital PR vs Link Building: What's the Difference?", 'text' => 'A clear breakdown of how each approach can grow your authority.', 'image' => 'images/shruti-hero.png', 'href' => '/insights/digital-pr-vs-link-building'],
                ['title' => 'Book Marketing in 2026: What Authors Should Know', 'text' => 'Strategies that help authors get noticed in a crowded market.', 'image' => 'images/shruti-founder.jpg', 'href' => '/insights/book-marketing-2026'],
            ],
            'audienceCards' => [
                [
                    'title' => 'Authors & Publishers',
                    'description' => 'For authors and publishers who want their work discovered.',
                    'href' => route('services.authors'),
                    'cta' => 'Explore services for authors',
                    'tone' => 'teal',
                    'image' => 'images/audience-authors-desk.png',
                    'imageAlt' => "Stack of books, notebook and pen on a writer's desk",
                    'icon' => 'book',
                    'highlights' => ['Reach the right readers', 'Build authority with compelling content', 'Amplify your book or publishing brand'],
                ],
                [
                    'title' => 'Businesses & Brands',
                    'description' => 'For service businesses and brands whose expertise deserves a stronger voice online.',
                    'href' => route('services.brands'),
                    'cta' => 'Explore services for businesses',
                    'tone' => 'mauve',
                    'image' => 'images/audience-brands-desk.png',
                    'imageAlt' => 'Laptop, notebook and coffee on a professional desk',
                    'icon' => 'briefcase',
                    'highlights' => ['Attract the right audience', 'Earn trust & improve search visibility', 'Communicate with clarity and impact'],
                ],
            ],
            'problems' => [
                "My website doesn't represent what I actually do.",
                'I have a book in my head but no idea how to get it out.',
                "I'm not showing up on Google — or anywhere.",
                'My content is written — it just needs someone to sharpen it.',
                'My LinkedIn is either inconsistent or completely silent.',
            ],
            'processSteps' => [
                ['number' => '01', 'title' => 'Discover', 'text' => 'We understand your goals, audience and ambitions.', 'icon' => 'chat'],
                ['number' => '02', 'title' => 'Research', 'text' => 'We dive deep into data, insights and opportunities.', 'icon' => 'search'],
                ['number' => '03', 'title' => 'Create', 'text' => 'We craft compelling content that connects and converts.', 'icon' => 'edit'],
                ['number' => '04', 'title' => 'Optimise', 'text' => 'We refine for SEO, readability and impact.', 'icon' => 'spark'],
                ['number' => '05', 'title' => 'Deliver', 'text' => 'We deliver on time and measure what matters.', 'icon' => 'check'],
            ],
            'whyBlocks' => [
                ['title' => 'Human-written. Always.', 'icon' => 'edit', 'description' => "Every word is written by hand — researched, considered, and crafted for your specific audience. No AI-generated filler. No recycled frameworks. Content that sounds like you, and works for the people you're trying to reach."],
                ['title' => 'Content + development together', 'icon' => 'website', 'description' => 'Website copy and website build under one engagement. No brief lost between a writer and a developer. No misaligned design and messaging. Everything built in the same time, for the same audience.'],
                ['title' => 'Research is the foundation', 'icon' => 'search', 'description' => "An M.Phil in Management and 9+ years of professional experience across finance, technology, and education means we understand the fields we work in. We don't just write about your expertise. We understand it."],
                ['title' => '5–10 clients. Full attention.', 'icon' => 'check', 'description' => "We deliberately limit how many clients we take on. Not because we can't handle more — but because your brand deserves focus, not a queue. When you work with LinkingWordz, you are not a ticket number."],
            ],
        ]);
    }
}
