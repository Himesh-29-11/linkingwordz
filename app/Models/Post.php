<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'body',
        'category',
        'image',
        'display_date',
        'status',
        'views',
        'likes_count',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'body' => 'array',
            'published_at' => 'datetime',
        ];
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function approvedComments(): HasMany
    {
        return $this->hasMany(Comment::class)->where('status', 'approved')->latest();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function bodyParagraphs(): array
    {
        $body = $this->body ?? [];

        if (is_string($body)) {
            return [['type' => 'p', 'text' => $body]];
        }

        if ($body === []) {
            return [['type' => 'p', 'text' => (string) $this->excerpt]];
        }

        return $body;
    }

    public function bodyAsText(): string
    {
        return collect($this->bodyParagraphs())
            ->map(fn ($block) => is_array($block) ? ($block['text'] ?? '') : (string) $block)
            ->filter()
            ->implode("\n\n");
    }

    public static function makeSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'post';
        $slug = $base;
        $i = 2;

        while (static::query()
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $base.'-'.$i;
            $i++;
        }

        return $slug;
    }

    public static function publicCount(string $slug, string $kind): int
    {
        $hash = unpack('N', hash('crc32b', $slug.'|'.$kind.'|lw-public', true))[1];

        return 30 + ($hash % 71);
    }

    public function toPublicArray(): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'text' => $this->excerpt,
            'date' => $this->display_date ?: optional($this->published_at)->format('M j'),
            'category' => $this->category ?: 'Blog',
            'image' => $this->image ?: 'images/blog/blog-hero.jpg',
            'body' => $this->bodyParagraphs(),
            'seo_title' => $this->seo_title ?: $this->title,
            'seo_description' => $this->seo_description ?: Str::limit(strip_tags((string) $this->excerpt), 160),
            'seo_keywords' => $this->seo_keywords,
            'likes' => static::publicCount($this->slug, 'likes'),
            'comments' => static::publicCount($this->slug, 'comments'),
            'shares' => static::publicCount($this->slug, 'shares'),
            'views' => (int) $this->views,
        ];
    }
}
