<?php

namespace App\Support;

class PageSectionDefaults
{
    public static function slugs(): array
    {
        return [
            'home',
            'about',
            'contact',
            'services',
            'services-brands',
            'services-authors',
            'services-work-with-me',
            'privacy-policy',
            'terms-and-conditions',
        ];
    }

    public static function titles(): array
    {
        return [
            'home' => 'Home page',
            'about' => 'About page',
            'contact' => 'Contact page',
            'services' => 'Services page',
            'services-brands' => 'Services — Brands',
            'services-authors' => 'Services — Authors',
            'services-work-with-me' => 'Services — Work With Me',
            'privacy-policy' => 'Privacy Policy',
            'terms-and-conditions' => 'Terms & Conditions',
        ];
    }

    public static function publicPath(string $slug): string
    {
        return match ($slug) {
            'home' => '/',
            'services' => '/services',
            'services-brands' => '/services/brands',
            'services-authors' => '/services/authors',
            'services-work-with-me' => '/services/work-with-me',
            default => '/'.$slug,
        };
    }

    public static function publicRoute(string $slug): ?string
    {
        return match ($slug) {
            'home' => 'home',
            'about' => 'about',
            'contact' => 'contact',
            'services' => 'services',
            'services-brands' => 'services.brands',
            'services-authors' => 'services.authors',
            'services-work-with-me' => 'services.work',
            default => null,
        };
    }

    public static function schema(string $slug): array
    {
        return match ($slug) {
            'home' => self::homeSchema(),
            'about' => self::aboutSchema(),
            'contact' => self::contactSchema(),
            'services' => self::servicesSchema(),
            'services-brands' => self::servicesBrandsSchema(),
            'services-authors' => self::servicesAuthorsSchema(),
            'services-work-with-me' => self::servicesWorkSchema(),
            default => [
                ['id' => 'content', 'label' => 'Page content', 'fields' => [
                    ['key' => 'body', 'label' => 'Body HTML', 'type' => 'html'],
                ]],
            ],
        };
    }

    public static function defaults(string $slug): array
    {
        return match ($slug) {
            'home' => [
                'hero' => [
                    'eyebrow' => "Content & Editorial Services for\nAuthors and Service Businesses",
                    'title_accent_1' => 'words',
                    'title_accent_2' => 'clients.',
                    'title_strong' => 'We make sure yours do.',
                    'description' => 'Linkingwordz is a content and editorial brand built for two kinds of people — authors who want their work discovered, and service businesses whose expertise deserves a stronger voice online.',
                    'highlight' => "Human-written. Research-backed.\nBuilt around your brand. Not a template.",
                    'discovery' => "Not sure which fits? Book a free discovery call — we'll figure it out together.",
                    'image' => 'images/shruti-hero.jpg',
                    'founder_title' => "Hi, I'm Shruti.",
                    'founder_role' => 'Content Writer, Copyeditor & Ghostwriter',
                    'badge_top' => 'Stories that connect',
                    'badge_bottom' => 'Results that last',
                    'mini_1_title' => 'Copywriter',
                    'mini_1_text' => 'Words that connect and convert.',
                    'mini_2_title' => 'Content Writer',
                    'mini_2_text' => 'Stories that inform, engage and rank.',
                ],
                'stats' => [
                    'stat_1_value' => '9+',
                    'stat_1_label' => 'Years experience',
                    'stat_2_value' => 'M.Phil',
                    'stat_2_label' => 'In management',
                    'stat_3_value' => 'Finance · Technology · Education',
                    'stat_3_label' => 'Core expertise',
                    'stat_4_value' => '5–10 clients',
                    'stat_4_label' => 'At a time · Personal attention',
                ],
                'publications' => [
                    'label' => 'As read & published in',
                    'names' => "The Ledger Review\nNorwood Press\nFormé Studio\nInkwell Digest",
                ],
                'audience' => [
                    'label' => 'Two audiences. One standard of work.',
                    'title' => 'Which path is yours?',
                    'intro' => 'Linkingwordz is built for two kinds of people — with one goal: meaningful content that connects and converts.',
                    'banner' => "Not sure which fits? Book a free discovery call — we'll figure it out together.",
                ],
                'problem' => [
                    'eyebrow' => 'Why clients come to us',
                    'title' => "You're not struggling because your work isn't good enough. You're struggling because it isn't visible enough.",
                    'subhead' => "We've heard this before. Many times.",
                    'closing' => 'These are the 5 problems Linkingwordz was built to solve. Not with a production line — but with research, care, and a team that works with 5 to 10 clients at a time. Deliberately.',
                ],
                'services' => [
                    'eyebrow' => 'What we do',
                    'title' => 'Strategic content. Editorial excellence. Real impact.',
                ],
                'why' => [
                    'eyebrow' => 'What makes this different',
                    'title' => '5 problems. 1 solution. Built around your brand.',
                    'description' => 'Most content agencies give you a template. Most developers wait for your copy. Most editors don\'t understand your subject matter. At Linkingwordz, we bring all of it together; with the research depth, subject expertise, and personal attention that only comes from working with a small, intentional client list.',
                ],
                'founder' => [
                    'eyebrow' => 'The person behind the work',
                    'title' => "Hi, I'm Shruti.",
                    'text_1' => "I'm a content writer, copyeditor, and ghostwriter with 9+ years of professional experience across linguistics, content, and writing — working with clients across finance, technology, and education.",
                    'text_2' => 'Before Linkingwordz, I was a college lecturer in Accounting, Finance, and Management — a role that gave me something most writers don\'t have: genuine depth in the subjects I write and edit in. I hold an M.Phil in Management, and I bring that research foundation into every brief I take on.',
                    'text_3' => 'Linkingwordz is built on a simple belief — that human-written, research-backed content is still the most powerful way to build trust with the people you want to reach. I work with a maximum of 5 to 10 clients at a time, because your brand deserves full attention. Not a queue.',
                    'credentials' => 'M.Phil in Management · 9+ Years Industry Experience · Finance · Technology · Education',
                    'image' => 'images/shruti-founder.jpg',
                ],
                'process' => [
                    'eyebrow' => 'Our process',
                    'title' => 'A clear process. Thoughtful execution.',
                ],
                'work' => [
                    'eyebrow' => 'Selected work',
                    'title' => 'Real clients. Real results.',
                    'tag' => 'LinkedIn personal brand',
                    'lede' => 'A tale of exceptional growth — strategic editing that made Kiran’s voice land with the right audience.',
                    'quote' => '“Her keen eye for detail boosted my post impressions by 26% in a week. If you’re looking for an editor who elevates your content, she’s the one to trust.”',
                    'quote_cite' => 'Kiran Lasiyal',
                ],
                'final_cta' => [
                    'title' => 'Ready to find the right words?',
                    'text' => 'Book a free discovery call. No obligation — not even after two calls.',
                ],
            ],
            'about' => [
                'hero' => [
                    'eyebrow' => 'About Shruti Bhatt',
                    'title' => "Hey there! I'm Shruti Bhatt, your friendly editor & nerd.",
                    'text' => "When I'm not busy correcting 'their' to 'they're', you can find me indulging in a good book or sipping on some fancy coffee!",
                    'role' => 'Copywriter, Editor & Proofreader',
                    'image' => 'images/shruti-hero.jpg',
                    'chip_1' => 'Book editor',
                    'chip_2' => 'Copy & proof',
                    'chip_3' => '9+ years',
                    'chip_4' => "Let's talk words",
                ],
                'journey' => [
                    'eyebrow' => 'My Journey so far...',
                    'title' => 'Hooked on languages, then on the work of words.',
                    'text_1' => "Ever since I finished my graduation and visited Dubai to looking for a job, I've been hooked on different types of languages & cultures.",
                    'text_2' => 'After completing Masters degree, I started teaching spoken English to different ages of students. Then, I became a lecturer as Business communication, Accounting & finance with my Masters in Accounting for 2.5 years.',
                    'text_3' => 'After Exploring that journey & completing my M.Phil, I have started my corporate journey in Google, PhonePe, Spotify, Snapchat, Facebook, etc. well-known clients as a Regional language Translator, Reviewer and Team lead on a full-time as well as freelance basis in Bangalore for 7+ years.',
                    'text_4' => "Although, I realized that I wanted to immersing in the words of writing! That's when I came across this Editing & Proofreading field and dived right into it. Got certified from Edit Republic as well as HPA. Fast forward a few years, and now, I'm a professional proofreader since last 2 years, with my Instagram Brand Linkingwordz; I offer professional copy editing & proofreading services for books, manuscripts, and business documents. My book proofreading ensures that your writing is error-free and polished.",
                    'text_5' => 'I also Offer B2B Copy writing & Content writing services. You can ping me at the right corner at the down and I will send you my portfolio with all the work samples and analytics. Other details are on the Services page.',
                    'image' => 'images/about/about-grammar.jpg',
                ],
                'work' => [
                    'eyebrow' => 'The work',
                    'title' => 'There’s always a moment when the editor thinks to themself, This is it.',
                    'text_1' => 'This is the heart of the book. These words are going to create an immense impact on someone’s life.',
                    'pull_quote' => 'Those are the moments I live for.',
                    'text_2' => "Whether you're a writer with tons of experience or just starting out; I'm here to help you make your work even better. With a keen eye and a passion for language, I'll carefully review your content, making sure they're error-free, clear, and impactful.",
                    'text_3' => 'When your manuscript hits my inbox, you better believe I’m creating a custom package just for your project!',
                    'image' => 'images/about/about-desk.jpeg',
                ],
                'know' => [
                    'title' => 'Get to know Me!',
                    'image_1' => 'images/about/about-ig-1.png',
                    'image_2' => 'images/about/about-ig-2.png',
                    'image_3' => 'images/about/about-ig-3.png',
                ],
                'genres' => [
                    'title' => 'Few Genres I love to read/work on...',
                    'nonfiction' => "Philosophy\nHealth & wellness\nSelf-help\nTravel guides\nBusiness & economics\nLanguage & Culture\nMemoirs & biographies, etc.",
                    'fiction' => "Fantasy\nMystery & Thriller\nYoung Adult\nScience Fiction\nHistorical fiction\nRomance\nAction & Adventure, etc.",
                ],
                'instagram' => [
                    'title' => 'Few Instagram posts people loved the most!',
                ],
                'cta' => [
                    'title' => "Let's Chat!",
                    'text' => 'Reach out to Linkingwordz for professional proofreading, copyediting, and copywriting services.',
                ],
            ],
            'contact' => [
                'hero' => [
                    'eyebrow' => 'Contact',
                    'title' => 'Get in touch',
                    'text_1' => "Whether you need compelling copywriting, expert ghostwriting, or precise editing & proofreading for your fiction or non-fiction book work, I'm here to help elevate your writing to the next level!",
                    'text_2' => 'Feel free to contact us using the form. Alternatively, you can email me at connect@linkingwordz.com',
                    'email' => 'connect@linkingwordz.com',
                    'image' => 'images/contact/shruti-contact.jpg',
                ],
                'form' => [
                    'eyebrow' => 'Write to us',
                    'title' => 'Send a message',
                ],
                'booking' => [
                    'eyebrow' => 'Book a call',
                    'title' => 'Pick a time that works',
                    'lede' => 'A free 30-minute discovery call. No obligation — not even after two calls. Choose a day and a slot, then confirm on Calendly.',
                    'calendly_url' => 'https://calendly.com/linkingwordz/30min',
                    'note' => 'Or open Calendly and choose any open slot.',
                ],
            ],
            'services' => [
                'hero' => [
                    'eyebrow' => 'Services',
                    'title' => '5 content problems. 1 solution. Built for your brand.',
                    'intro_1' => "Most brands don't have a content problem. They have a clarity problem — about what to say, where to say it, and how to make it work together.",
                    'intro_2' => 'At Linkingwordz, we handle your website, your blogs, your LinkedIn presence, your book, and your editorial work — all under one roof. Human-written. Research-backed. Built for the audience you actually want to reach.',
                    'cta_label' => 'Book a free discovery call',
                    'cta_url' => 'https://calendly.com/linkingwordz/30min',
                    'cta_note' => 'No obligation. Not even after 2 calls.',
                ],
                'journey' => [
                    'eyebrow' => 'Does any of this sound familiar?',
                    'title' => 'These are the 5 problems we solve. Every single day.',
                    'problems' => "“My website doesn't represent what I actually do.”\n“I'm not showing up on Google — or anywhere.”\n“My LinkedIn is either inconsistent or completely silent.”\n“I have a book in my head but no idea how to get it out.”\n“My content is written — it just needs someone to sharpen it.”",
                ],
            ],
            'services-authors' => [
                'hero' => [
                    'eyebrow' => 'Content & Editorial Services for Publishers',
                    'title' => 'From manuscript to <em>market.</em>',
                    'lede' => 'Linkingwordz helps publishers, literary agents, and their authors build editorial quality and online visibility. Human-written. Research-backed. Delivered on time.',
                ],
            ],
            'services-work-with-me' => [
                'hero' => [
                    'eyebrow' => 'For new freelancers',
                    'title' => 'Started freelancing but feeling stuck?',
                    'lede' => "In 45 minutes, we'll go from confusion to a clear 30-day action plan — built around your skills, your strengths, and where you actually are right now.",
                    'pills' => "45-minute session\n1:1 with Shruti\nVia Topmate",
                    'cta_label' => 'Book on Topmate',
                    'cta_url' => 'https://topmate.io/shrutibhatt/1835899',
                    'cta_note' => 'No obligation. Not even after 2 calls.',
                    'image' => 'images/shruti-founder.jpg',
                ],
            ],
            'services-brands' => [
                'masthead' => [
                    'eyebrow' => 'A Linkingwordz Growth Framework',
                    'title' => 'Every recognised authority<br>started <em>exactly</em> where you are.',
                    'subtitle' => 'A three-phase path that takes you from "no one\'s heard of me yet" to being the name your industry already trusts — before they\'ve even spoken to you.',
                    'chips' => "Coaches\nConsultants\nFinancial Advisors\nHealth, Wellness & Nutrition Professionals\nMental Health Professionals\nTravel & Culture Brands\nLifestyle & Self-Care Experts\nNGOs & Social Impact Organizations\nGrowing Brands",
                ],
                'cta' => [
                    'title' => 'Which phase matches where you are today?',
                    'text' => "Book a strategy call and we'll tell you exactly where you fit — no guesswork, no generic package.",
                    'button_label' => 'Book Your Strategy Call',
                    'alt_text' => 'Need a custom plan? <a href="/contact">Fill out this contact form</a> and we\'ll reach out to you, or email us directly at <a href="mailto:connect@linkingwordz.com">connect@linkingwordz.com</a>.',
                ],
            ],
            default => [],
        };
    }

    private static function homeSchema(): array
    {
        return [
            ['id' => 'hero', 'label' => 'Hero', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'textarea'],
                ['title_accent_1', 'Highlighted word 1', 'text'],
                ['title_accent_2', 'Highlighted word 2', 'text'],
                ['title_strong', 'Headline closing line', 'text'],
                ['description', 'Intro paragraph', 'textarea'],
                ['highlight', 'Highlight line', 'textarea'],
                ['discovery', 'Discovery line', 'textarea'],
                ['image', 'Portrait photo', 'image'],
                ['founder_title', 'Founder card title', 'text'],
                ['founder_role', 'Founder card role', 'text'],
                ['badge_top', 'Round badge top line', 'text'],
                ['badge_bottom', 'Round badge bottom line', 'text'],
                ['mini_1_title', 'Mini card 1 title', 'text'],
                ['mini_1_text', 'Mini card 1 text', 'text'],
                ['mini_2_title', 'Mini card 2 title', 'text'],
                ['mini_2_text', 'Mini card 2 text', 'text'],
            ])],
            ['id' => 'stats', 'label' => 'Stats strip', 'fields' => self::fields([
                ['stat_1_value', 'Stat 1 value', 'text'], ['stat_1_label', 'Stat 1 label', 'text'],
                ['stat_2_value', 'Stat 2 value', 'text'], ['stat_2_label', 'Stat 2 label', 'text'],
                ['stat_3_value', 'Stat 3 value', 'text'], ['stat_3_label', 'Stat 3 label', 'text'],
                ['stat_4_value', 'Stat 4 value', 'text'], ['stat_4_label', 'Stat 4 label', 'text'],
            ])],
            ['id' => 'publications', 'label' => 'Publication strip', 'fields' => self::fields([
                ['label', 'Strip label', 'text'],
                ['names', 'Publication names (one per line)', 'textarea'],
            ])],
            ['id' => 'audience', 'label' => 'Audience section header', 'fields' => self::fields([
                ['label', 'Section label', 'text'],
                ['title', 'Section title', 'text'],
                ['intro', 'Intro text', 'textarea'],
                ['banner', 'Banner text', 'textarea'],
            ])],
            ['id' => 'problem', 'label' => 'Problem section', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Headline', 'textarea'],
                ['subhead', 'Subhead', 'text'],
                ['closing', 'Closing paragraph', 'textarea'],
            ])],
            ['id' => 'services', 'label' => 'Services section header', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
            ])],
            ['id' => 'why', 'label' => 'Why section header', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['description', 'Description', 'textarea'],
            ])],
            ['id' => 'founder', 'label' => 'Founder section', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['text_1', 'Paragraph 1', 'textarea'],
                ['text_2', 'Paragraph 2', 'textarea'],
                ['text_3', 'Paragraph 3', 'textarea'],
                ['credentials', 'Credentials line', 'text'],
                ['image', 'Founder photo', 'image'],
            ])],
            ['id' => 'process', 'label' => 'Process section header', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
            ])],
            ['id' => 'work', 'label' => 'Selected work spotlight', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['tag', 'Tag line', 'text'],
                ['lede', 'Lead paragraph', 'textarea'],
                ['quote', 'Client quote', 'textarea'],
                ['quote_cite', 'Quote attribution', 'text'],
            ])],
            ['id' => 'final_cta', 'label' => 'Final call to action', 'fields' => self::fields([
                ['title', 'Title', 'text'],
                ['text', 'Text', 'textarea'],
            ])],
        ];
    }

    private static function aboutSchema(): array
    {
        return [
            ['id' => 'hero', 'label' => 'Hero', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Headline', 'text'],
                ['text', 'Intro', 'textarea'],
                ['role', 'Role line', 'text'],
                ['image', 'Portrait photo', 'image'],
                ['chip_1', 'Chip 1', 'text'], ['chip_2', 'Chip 2', 'text'],
                ['chip_3', 'Chip 3', 'text'], ['chip_4', 'Chip 4', 'text'],
            ])],
            ['id' => 'journey', 'label' => 'Journey section', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['text_1', 'Paragraph 1', 'textarea'],
                ['text_2', 'Paragraph 2', 'textarea'],
                ['text_3', 'Paragraph 3', 'textarea'],
                ['text_4', 'Paragraph 4', 'textarea'],
                ['text_5', 'Paragraph 5', 'textarea'],
                ['image', 'Section photo', 'image'],
            ])],
            ['id' => 'work', 'label' => 'Work section', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['text_1', 'Paragraph 1', 'textarea'],
                ['pull_quote', 'Pull quote', 'text'],
                ['text_2', 'Paragraph 2', 'textarea'],
                ['text_3', 'Paragraph 3', 'textarea'],
                ['image', 'Section photo', 'image'],
            ])],
            ['id' => 'know', 'label' => 'Get to know me', 'fields' => self::fields([
                ['title', 'Title', 'text'],
                ['image_1', 'Phone image 1', 'image'],
                ['image_2', 'Phone image 2', 'image'],
                ['image_3', 'Phone image 3', 'image'],
            ])],
            ['id' => 'genres', 'label' => 'Genres', 'fields' => self::fields([
                ['title', 'Title', 'text'],
                ['nonfiction', 'Non-fiction list (one per line)', 'textarea'],
                ['fiction', 'Fiction list (one per line)', 'textarea'],
            ])],
            ['id' => 'instagram', 'label' => 'Instagram carousel', 'fields' => self::fields([
                ['title', 'Section title', 'text'],
            ])],
            ['id' => 'cta', 'label' => 'Final CTA', 'fields' => self::fields([
                ['title', 'Title', 'text'],
                ['text', 'Text', 'textarea'],
            ])],
        ];
    }

    private static function contactSchema(): array
    {
        return [
            ['id' => 'hero', 'label' => 'Hero', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['text_1', 'Paragraph 1', 'textarea'],
                ['text_2', 'Paragraph 2', 'textarea'],
                ['email', 'Email address', 'text'],
                ['image', 'Hero photo', 'image'],
            ])],
            ['id' => 'form', 'label' => 'Contact form header', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
            ])],
            ['id' => 'booking', 'label' => 'Book a call', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['lede', 'Intro text', 'textarea'],
                ['calendly_url', 'Calendly URL', 'text'],
                ['note', 'Footer note', 'text'],
            ])],
        ];
    }

    private static function servicesSchema(): array
    {
        return [
            ['id' => 'hero', 'label' => 'Hero', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['intro_1', 'Paragraph 1', 'textarea'],
                ['intro_2', 'Paragraph 2', 'textarea'],
                ['cta_label', 'CTA button label', 'text'],
                ['cta_url', 'CTA URL', 'text'],
                ['cta_note', 'CTA note', 'text'],
            ])],
            ['id' => 'journey', 'label' => 'Problems section', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['problems', 'Problem quotes (one per line)', 'textarea'],
            ])],
        ];
    }

    private static function servicesAuthorsSchema(): array
    {
        return [
            ['id' => 'hero', 'label' => 'Hero', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title (HTML allowed)', 'html'],
                ['lede', 'Intro', 'textarea'],
            ])],
        ];
    }

    private static function servicesWorkSchema(): array
    {
        return [
            ['id' => 'hero', 'label' => 'Hero', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['lede', 'Intro', 'textarea'],
                ['pills', 'Pills (one per line)', 'textarea'],
                ['cta_label', 'CTA button label', 'text'],
                ['cta_url', 'CTA URL', 'text'],
                ['cta_note', 'CTA note', 'text'],
                ['image', 'Photo', 'image'],
            ])],
        ];
    }

    private static function servicesBrandsSchema(): array
    {
        return [
            ['id' => 'masthead', 'label' => 'Masthead', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title (HTML allowed)', 'html'],
                ['subtitle', 'Subtitle', 'textarea'],
                ['chips', 'Audience chips (one per line)', 'textarea'],
            ])],
            ['id' => 'cta', 'label' => 'Final CTA', 'fields' => self::fields([
                ['title', 'Title', 'text'],
                ['text', 'Text', 'textarea'],
                ['button_label', 'Button label', 'text'],
                ['alt_text', 'Footer note (HTML allowed)', 'html'],
            ])],
        ];
    }

    private static function fields(array $rows): array
    {
        return array_map(fn (array $row) => [
            'key' => $row[0],
            'label' => $row[1],
            'type' => $row[2],
        ], $rows);
    }

    public static function merge(string $slug, ?array $stored): array
    {
        $defaults = self::defaults($slug);
        if ($stored === null || $stored === []) {
            return $defaults;
        }

        $merged = $defaults;
        foreach ($stored as $sectionId => $fields) {
            if (! is_array($fields)) {
                continue;
            }
            $merged[$sectionId] = array_merge($merged[$sectionId] ?? [], $fields);
        }

        return $merged;
    }
}
