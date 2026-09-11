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
                'block_website' => self::serviceBlockDefaults(
                    '01 — Your Website',
                    "Your brand's first impression happens before you say a word.",
                    'Where credibility lands — or disappears.',
                    "Whether you are a coach, a consultant, a therapist, or an entrepreneurial company — your website is where credibility either lands or disappears. We don't just write your website copy. We handle content strategy, the actual writing, design direction, and development coordination altogether. So you don't have to manage five different people to launch one website.",
                    ['Content strategy + full website copy', 'Website design and development', 'Domain selection guidance and technical onboarding', 'Platform recommendation (Wix, WordPress, Squarespace, etc.)', 'Technical support post-launch'],
                    'This is a 3-month engagement. We onboard you, build with you, and hand over with full support.'
                ),
                'block_blogs' => self::serviceBlockDefaults(
                    '02 — Your Blogs',
                    "The content that keeps working long after you've stopped posting.",
                    'SEO + AEO-optimised. Built to be found.',
                    "Blogs are how your ideal clients find you — not just today, but six months from now. We write SEO and AEO-optimised blogs that answer the exact questions your audience is already searching for. For coaches and service brands, that means blogs that position you as the go-to expert in your niche. For authors, we write book promotional blogs that turn your work into something commercially discoverable — reaching your ideal readers through search, before they've even heard your name.\n\nIdeally, 12 blogs give your brand a strong organic foundation and a meaningful SEO boost.",
                    ['Research-led topic selection (based on your niche + SEO gaps)', 'SEO + AEO optimised long-form blog writing', 'Book promotional blogs (for authors)', 'Internal linking strategy', 'Ready-to-publish formatting']
                ),
                'block_linkedin' => self::serviceBlockDefaults(
                    '03 — Your LinkedIn Presence',
                    'Your most powerful professional platform. Most people treat it like a notice board.',
                    'A sales conversation happening without you in the room.',
                    "LinkedIn is where buying decisions are made quietly. A potential client reads three of your posts before they ever reach out. Which means your LinkedIn content isn't just visibility — it's a sales conversation happening without you in the room.\n\nWe offer a dedicated 3-month LinkedIn Content Package — standalone, not bundled with any other service. We learn your voice, your story, and your professional positioning. Then we write it. You post it. Your audience grows.",
                    ['Voice discovery session (we write in your voice, not ours)', 'Content calendar — topics, hooks, post structure', 'Written posts — stories, insights, thought leadership, authority content', 'Strategic use of POV framing, storytelling, and engagement hooks', "3-month minimum engagement (that's how long it takes to see real traction)"]
                ),
                'block_book' => self::serviceBlockDefaults(
                    '04 — Your Book',
                    'The most credible thing a thought leader can have. Most never finish it.',
                    'Your ideas. Your voice. On the page.',
                    "Whether you want to document your journey, build authority in your industry, or publish something your clients will find on their shelves — we help you write it. As ghostwriters, we bring your ideas, your voice, and your experience to the page. You own it entirely.\n\nWe also have deep experience in the publishing process — from manuscript to market — and we work with indie and traditionally published authors alike. Many established coaches, consultants, and corporate brands now keep a book on the boardroom table. It is not a vanity project. It is a business asset.",
                    ['Ghostwriting — business books, memoirs, brand stories, thought leadership', 'Copyediting and proofreading', 'Book Translation', 'Publishing process knowledge (traditional + self-publishing)'],
                    'For Authors &amp; Publishers — full editorial support details →'
                ),
                'block_editorial' => self::serviceBlockDefaults(
                    '05 — Your Editorial Support',
                    'Good ideas deserve clean, publication-ready execution.',
                    'A professional eye, quietly in the background.',
                    "If your content is already written but needs a professional eye before it goes out — this is where we work quietly in the background. We copyedit, proofread, and refine manuscripts, white papers, academic journals, business documents, and marketing materials.\n\nOur editorial work goes deeper because of the research foundation behind it. With an M.Phil in Management and 9+ years of hands-on experience in finance, psychology, and mental health content — we don't just fix grammar. We understand the subject matter we're editing.",
                    ['Independent authors before submission or self-publishing', 'Publishers and literary agents', 'Corporate brands and businesses', 'Academic institutions and journals'],
                    'For Authors &amp; Publishers — full editorial support details →'
                ),
                'different' => [
                    'eyebrow' => 'What makes working with us different',
                    'title' => "This is what you're actually getting.",
                    'items' => "Research Is Our Foundation|An M.Phil in Management isn't a qualification we mention in passing. It means every brief is approached with genuine intellectual rigour — not surface-level assumptions. You get content that's thought through, not just written fast.\n5–10 Clients At A Time. That's It.|We deliberately limit how many clients we take on. Not because we can't handle more — but because your brand deserves full attention, not a slot in a production queue. When you're with us, you have our focus.\nWe Deliver On Timelines. With Proof.|We've written 10 blogs per client for 3 different clients — in a single month. Without compromising research quality or voice consistency. Deadlines aren't a pressure point for us. They're part of how we work.\nHuman-Generated. Always.|In a world full of AI-generated content that sounds like everyone else, we write every word by hand. Research-based copy. Real voice. Real thinking. That's not a differentiator we offer — it's a standard we hold.\nContent + Development. Together.|Most agencies hand you copy and say goodbye. Most developers ask you for copy and wait. We sit in both rooms. Content strategy, writing, design direction, and development coordination happen under one engagement.",
                ],
                'clarity' => [
                    'eyebrow' => 'Clarity',
                    'title' => "This is content marketing. It's not the same as PR.",
                    'marketing_title' => 'Content Marketing',
                    'marketing_text' => "Content marketing is the long game. It builds your brand's credibility, searchability, and trust — over time, through content you own. A well-written blog lives on your website for years, answering the same question your ideal client is searching for at 11pm on a Tuesday. A LinkedIn post in your voice builds familiarity before anyone books a call. Content marketing doesn't interrupt your audience — it earns their attention, answers their questions, and positions you as the obvious choice. It influences real buying decisions. Quietly. Consistently.",
                    'pr_title' => 'PR',
                    'pr_text' => "PR is about earned media — getting your name into publications, press, and platforms you don't own. It's valuable for visibility and reputation, especially at scale. But PR without a content foundation is like sending someone to a party with no business card. They hear your name and then can't find you. PR tells people you exist. Content marketing shows them why you matter — and keeps showing them, long after the press mention fades.",
                    'pull_quote' => 'PR puts your name in the room. Content marketing makes them remember why they came to find you.',
                ],
                'framework' => [
                    'eyebrow' => 'A framework before we begin',
                    'title' => 'Before any content strategy — know your one purpose right now',
                    'lede' => "At Linkingwordz, we believe every brand needs a primary focus at every stage of its journey. You can't grow your followers, collect testimonials, and drive engagement all at once — not effectively. So before we write a single word for your brand, we ask you this: What does your brand most need right now?",
                    'cards' => "Grow Your Followers|You have something valuable to say. But not enough people are listening yet. This phase is about expanding your reach — getting in front of new audiences who don't know you exist. Content here is built to attract, introduce, and invite. The goal is growth in numbers, but the strategy is built on relevance and consistency.\nBuild Social Proof|You have happy clients. But you're not leveraging what they've said about you. This phase is about turning your results into trust signals — testimonials, case studies, reviews, and client stories that speak to the next person sitting on the fence. This content doesn't sell. It convinces.\nIncrease Engagement|You have an audience. But they scroll past without responding. This phase is about deepening the relationship — sparking conversations, driving comments and shares, and making your content feel worth engaging with. Engagement signals credibility to algorithms AND to humans.",
                    'aside' => "Not sure which purpose is right for you right now? That's exactly what the discovery call is for — we figure it out together. It's free. No agenda. No pressure to buy.",
                ],
                'paths' => [
                    'eyebrow' => 'Two paths. Same standard of work.',
                    'authors_title' => 'For Authors & Publishers',
                    'authors_text' => 'Independent authors, publishing houses, literary agents, academic journals, and corporate brands producing long-form work.',
                    'authors_items' => "Ghostwriting\nCopyediting\nProofreading\nBook Promotional Blogs\nPublishing Guidance\nTranslation",
                    'authors_btn' => 'See full details',
                    'brands_title' => 'For Coaches, Brands & Businesses',
                    'brands_text' => 'Coaches, therapists, consultants, financial advisors, psychologists, wellness professionals, entrepreneurs, and SMEs.',
                    'brands_items' => "Website Content + Development\nSEO Blogs\nLinkedIn Writing\nThought Leadership\nEditorial Support",
                    'brands_btn' => 'See full details',
                ],
                'testimonials' => [
                    'eyebrow' => 'Client Love',
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
            self::serviceBlockSection('block_website', '01 — Website'),
            self::serviceBlockSection('block_blogs', '02 — Blogs'),
            self::serviceBlockSection('block_linkedin', '03 — LinkedIn'),
            self::serviceBlockSection('block_book', '04 — Book'),
            self::serviceBlockSection('block_editorial', '05 — Editorial'),
            ['id' => 'different', 'label' => 'What makes us different', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['items', 'Cards (title|text per line, blank line between cards)', 'textarea'],
            ])],
            ['id' => 'clarity', 'label' => 'Content marketing vs PR', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['marketing_title', 'Content marketing title', 'text'],
                ['marketing_text', 'Content marketing text', 'textarea'],
                ['pr_title', 'PR title', 'text'],
                ['pr_text', 'PR text', 'textarea'],
                ['pull_quote', 'Closing line', 'text'],
            ])],
            ['id' => 'framework', 'label' => 'Purpose framework', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['title', 'Title', 'text'],
                ['lede', 'Intro', 'textarea'],
                ['cards', 'Cards (title|text per line, blank line between cards)', 'textarea'],
                ['aside', 'Footer note', 'textarea'],
            ])],
            ['id' => 'paths', 'label' => 'Two paths', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
                ['authors_title', 'Authors card title', 'text'],
                ['authors_text', 'Authors card text', 'textarea'],
                ['authors_items', 'Authors list (one per line)', 'textarea'],
                ['authors_btn', 'Authors button label', 'text'],
                ['brands_title', 'Brands card title', 'text'],
                ['brands_text', 'Brands card text', 'textarea'],
                ['brands_items', 'Brands list (one per line)', 'textarea'],
                ['brands_btn', 'Brands button label', 'text'],
            ])],
            ['id' => 'testimonials', 'label' => 'Testimonials header', 'fields' => self::fields([
                ['eyebrow', 'Eyebrow', 'text'],
            ])],
        ];
    }

    private static function serviceBlockSection(string $id, string $label): array
    {
        return ['id' => $id, 'label' => $label, 'fields' => self::fields([
            ['num', 'Section label', 'text'],
            ['title', 'Title', 'text'],
            ['subhead', 'Subhead', 'text'],
            ['prose', 'Body paragraphs (separate with a blank line)', 'textarea'],
            ['checklist', 'Checklist items (one per line)', 'textarea'],
            ['aside', 'Footer note (optional, HTML allowed)', 'html'],
        ])];
    }

    private static function serviceBlockDefaults(
        string $num,
        string $title,
        string $subhead,
        string $prose,
        array $checklist,
        string $aside = ''
    ): array {
        return [
            'num' => $num,
            'title' => $title,
            'subhead' => $subhead,
            'prose' => $prose,
            'checklist' => implode("\n", $checklist),
            'aside' => $aside,
        ];
    }

    /** @return array<int, array{title: string, text: string}> */
    public static function parsePipeCards(string $raw): array
    {
        $raw = trim($raw);
        if ($raw === '') {
            return [];
        }

        $lines = array_values(array_filter(
            array_map('trim', preg_split('/\r\n|\r|\n/', $raw)),
            fn (string $line) => $line !== ''
        ));
        $pipeLineCount = count(array_filter($lines, fn (string $line) => str_contains($line, '|')));

        // One card per line when multiple Title|Text rows are stored with single line breaks.
        if ($pipeLineCount > 1) {
            $cards = [];
            foreach ($lines as $line) {
                if (! str_contains($line, '|')) {
                    continue;
                }

                [$title, $text] = array_pad(explode('|', $line, 2), 2, '');
                $cards[] = ['title' => trim($title), 'text' => trim($text)];
            }

            return $cards;
        }

        $cards = [];
        foreach (preg_split('/\r\n\r\n|\n\n/', $raw) as $chunk) {
            $chunk = trim($chunk);
            if ($chunk === '') {
                continue;
            }
            [$title, $text] = array_pad(explode('|', $chunk, 2), 2, '');
            $cards[] = ['title' => trim($title), 'text' => trim($text)];
        }

        return $cards;
    }

    /** @return array<int, string> */
    public static function parseLines(string $raw): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $raw))));
    }

    /** @return array<int, string> */
    public static function parseParagraphs(string $raw): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\r\n\r\n|\n\n/', $raw))));
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
