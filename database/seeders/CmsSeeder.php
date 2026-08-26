<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'connect@linkingwordz.com')],
            [
                'name' => 'Shruti Bhatt',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'LinkingWordz2026!')),
                'is_admin' => true,
            ]
        );

        $items = json_decode((string) file_get_contents(database_path('blog-posts.json')), true) ?: [];

        foreach ($items as $item) {
            Post::query()->updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'title' => $item['title'],
                    'excerpt' => $item['text'] ?? '',
                    'body' => $item['body'] ?? [],
                    'category' => $item['category'] ?? 'Blog',
                    'image' => $item['image'] ?? null,
                    'display_date' => $item['date'] ?? null,
                    'status' => 'published',
                    'views' => (int) ($item['views'] ?? 0),
                    'likes_count' => (int) ($item['likes'] ?? 0),
                    'published_at' => now(),
                ]
            );
        }
    }
}
