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
            'likes' => (int) $this->likes_count,
            'comments' => (int) $this->approvedComments()->count(),
            'views' => (int) $this->views,
        ];
    }
}
