<?php

namespace Database\Seeders;

use App\Models\SitePage;
use App\Models\Testimonial;
use App\Models\WorkItem;
use App\Support\Cms;
use App\Support\CmsDefaults;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        if (Schema::hasTable('services')) {
            $this->call(ServiceSeeder::class);
        }

        if (Schema::hasTable('trust_stats')) {
            $this->call(TrustStatSeeder::class);
        }

        $this->seedTestimonials();
        $this->seedWorkItems();
        $this->seedPages();
        $this->seedSettings();
    }

    private function seedTestimonials(): void
    {
        if (Testimonial::query()->exists()) {
            return;
        }

        foreach (CmsDefaults::homeTestimonials() as $i => $row) {
            Testimonial::query()->create([
                'quote' => $row['quote'],
                'name' => $row['name'],
                'role' => $row['role'],
                'avatar' => $row['avatar'] ?? null,
                'context' => 'home',
                'sort_order' => $i + 1,
            ]);
        }

        foreach (CmsDefaults::servicesTestimonials() as $i => $row) {
            Testimonial::query()->create([
                'quote' => $row['quote'] ?? '',
                'name' => $row['name'],
                'role' => $row['role'],
                'context' => 'services',
                'payload' => array_filter([
                    'intro' => $row['intro'] ?? null,
                    'bullets' => $row['bullets'] ?? null,
                    'outro' => $row['outro'] ?? null,
                    'meta' => $row['meta'] ?? null,
                ]),
                'sort_order' => $i + 1,
            ]);
        }
    }

    private function seedWorkItems(): void
    {
        if (WorkItem::query()->exists()) {
            return;
        }

        foreach (CmsDefaults::workItems() as $i => $row) {
            WorkItem::query()->create([
                'slug' => $row['slug'],
                'title' => $row['title'],
                'category' => $row['category'] ?? null,
                'client' => $row['client'] ?? null,
                'role' => $row['role'] ?? null,
                'text' => $row['text'] ?? null,
                'image' => $row['image'] ?? null,
                'result' => $row['result'] ?? null,
                'sort_order' => $i + 1,
            ]);
        }
    }

    private function seedPages(): void
    {
        $privacyBody = (string) file_get_contents(resource_path('views/pages/partials/privacy-default.blade.php'));

        SitePage::query()->updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'body' => $privacyBody,
            ]
        );

        SitePage::query()->updateOrCreate(
            ['slug' => 'terms-and-conditions'],
            [
                'title' => 'Terms & Conditions',
                'body' => '<p>Content will be added here before launch.</p>',
            ]
        );
    }

    private function seedSettings(): void
    {
        foreach (['email', 'connect_email', 'phone', 'whatsapp', 'address', 'instagram', 'facebook', 'linkedin'] as $key) {
            if (Cms::setting('contact.'.$key) === null) {
                Cms::saveSetting('contact.'.$key, CmsDefaults::contact($key));
            }
        }

        foreach (['featured_services', 'audience_cards', 'problems', 'why_blocks', 'process_steps'] as $key) {
            if (Cms::setting('home.'.$key) === null) {
                Cms::saveSetting('home.'.$key, CmsDefaults::homeSection($key), 'json');
            }
        }
    }
}
