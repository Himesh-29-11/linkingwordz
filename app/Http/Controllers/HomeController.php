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
                ['quote' => 'I just finished going over chapter one! Thank you so much for your input, I used quite a few of your suggestions. I want to say probably about 85% of them. Thank you for reviewing this for me.', 'name' => 'Eve Miller', 'role' => 'Author'],
                ['quote' => 'Shruti worked with us on proofreading our product notes and a few blogs. She is a thorough professional, punctual with deadlines, and most importantly an expert in her field. We wish you all the best for all your future endeavors.', 'name' => 'Paintphotographs', 'role' => 'Client'],
                ['quote' => 'Shruti has been working as a reviewer in my team for more than 2.5 years. She is a team player and has a very good command over the language, on time delivery, accuracy, high standard work ethics are some of her bright qualities. She is an asset to any team she works for.', 'name' => 'Rushabh Shah', 'role' => 'Client'],
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
            'whyBlocks' => [
                ['title' => 'Human-written. Always.', 'description' => "Every word is written by hand — researched, considered, and crafted for your specific audience. No AI-generated filler. No recycled frameworks. Content that sounds like you, and works for the people you're trying to reach."],
                ['title' => 'Content + development together', 'description' => 'Website copy and website build under one engagement. No brief lost between a writer and a developer. No misaligned design and messaging. Everything built in the same time, for the same audience.'],
                ['title' => 'Research is the foundation', 'description' => "An M.Phil in Management and 9+ years of professional experience across finance, technology, and education means we understand the fields we work in. We don't just write about your expertise. We understand it."],
                ['title' => '5–10 clients. Full attention.', 'description' => "We deliberately limit how many clients we take on. Not because we can't handle more — but because your brand deserves focus, not a queue. When you work with LinkingWordz, you are not a ticket number."],
            ],
        ]);
    }
}
