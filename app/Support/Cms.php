<?php

namespace App\Support;

use App\Models\PortfolioItem;
use App\Models\Service;
use App\Models\SitePage;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\WorkItem;
use App\Support\PageSectionDefaults;

class Cms
{
    public static function setting(string $key, mixed $default = null): mixed
    {
        try {
            $row = SiteSetting::query()->where('key', $key)->first();
            if (! $row) {
                return $default;
            }

            if ($row->type === 'json') {
                return json_decode((string) $row->value, true) ?? $default;
            }

            return $row->value ?? $default;
        } catch (\Throwable) {
            return $default;
        }
    }

    public static function saveSetting(string $key, mixed $value, string $type = 'text'): void
    {
        $stored = $type === 'json' ? json_encode($value) : (string) $value;

        SiteSetting::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $stored, 'type' => $type]
        );
    }

    public static function pageSections(string $slug): array
    {
        try {
            $page = SitePage::query()->where('slug', $slug)->first();
            if ($page?->sections) {
                return PageSectionDefaults::merge($slug, $page->sections);
            }
        } catch (\Throwable) {
            // Fall through to defaults.
        }

        return PageSectionDefaults::defaults($slug);
    }

    public static function pageBody(string $slug, ?string $default = null): ?string
    {
        try {
            $page = SitePage::query()->where('slug', $slug)->first();

            return $page?->body ?? $default;
        } catch (\Throwable) {
            return $default;
        }
    }

    public static function homeTestimonials(): array
    {
        try {
            $rows = Testimonial::query()->where('context', 'home')->orderBy('sort_order')->get();
            if ($rows->isNotEmpty()) {
                return $rows->map(fn (Testimonial $t) => [
                    'quote' => $t->quote,
                    'name' => $t->name,
                    'role' => $t->role,
                    'avatar' => $t->avatar ?: 'images/shruti-founder.jpg',
                ])->all();
            }
        } catch (\Throwable) {
            // Fall through to defaults.
        }

        return CmsDefaults::homeTestimonials();
    }

    public static function servicesTestimonials(): array
    {
        try {
            $rows = Testimonial::query()->where('context', 'services')->orderBy('sort_order')->get();
            if ($rows->isNotEmpty()) {
                return $rows->map(function (Testimonial $t) {
                    $payload = $t->payload ?? [];

                    return array_filter([
                        'intro' => $payload['intro'] ?? null,
                        'bullets' => $payload['bullets'] ?? null,
                        'outro' => $payload['outro'] ?? null,
                        'quote' => $t->quote ?: ($payload['quote'] ?? null),
                        'name' => $t->name,
                        'role' => $t->role,
                        'meta' => $payload['meta'] ?? null,
                    ], fn ($value) => $value !== null && $value !== []);
                })->all();
            }
        } catch (\Throwable) {
            // Fall through to defaults.
        }

        return CmsDefaults::servicesTestimonials();
    }

    public static function servicesList(): array
    {
        try {
            $rows = Service::query()->orderBy('sort_order')->get();
            if ($rows->isNotEmpty()) {
                return $rows->map(fn (Service $s) => [
                    'audience' => $s->audience,
                    'title' => $s->title,
                    'href' => $s->href,
                ])->all();
            }
        } catch (\Throwable) {
            // Fall through to defaults.
        }

        return CmsDefaults::servicesList();
    }

    public static function homeInsights(): array
    {
        try {
            $posts = Post::query()->published()->latest('published_at')->latest()->take(4)->get();
            if ($posts->isNotEmpty()) {
                return $posts->map(function (Post $post) {
                    $item = $post->toPublicArray();
                    $item['href'] = '/blog/'.$post->slug;

                    return $item;
                })->all();
            }
        } catch (\Throwable) {
            // Fall through to defaults.
        }

        return CmsDefaults::homeInsights();
    }

    public static function portfolioItems(): array
    {
        try {
            $rows = PortfolioItem::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->get();
            if ($rows->isNotEmpty()) {
                return $rows->map->toPublicArray()->all();
            }
        } catch (\Throwable) {
            // Fall through to defaults.
        }

        return CmsDefaults::portfolioItems();
    }

    public static function workItems(): array
    {
        try {
            $rows = WorkItem::query()->orderBy('sort_order')->get();
            if ($rows->isNotEmpty()) {
                return $rows->map->toPublicArray()->all();
            }
        } catch (\Throwable) {
            // Fall through to defaults.
        }

        return CmsDefaults::workItems();
    }

    public static function selectedWork(): array
    {
        $items = self::workItems();

        return $items !== [] ? [array_merge($items[0], [
            'href' => '/work/'.($items[0]['slug'] ?? ''),
        ])] : CmsDefaults::selectedWork();
    }

    public static function homeSection(string $key): array
    {
        return self::setting('home.'.$key, CmsDefaults::homeSection($key));
    }

    public static function contact(string $key, ?string $default = null): ?string
    {
        return self::setting('contact.'.$key, $default ?? CmsDefaults::contact($key));
    }
}
