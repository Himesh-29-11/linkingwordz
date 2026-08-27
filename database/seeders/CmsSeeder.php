<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@gmail.com')],
            [
                'name' => 'Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@123')),
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

        $commentFile = database_path('blog-comments.json');
        $commentSets = is_file($commentFile)
            ? (json_decode((string) file_get_contents($commentFile), true) ?: [])
            : [];

        foreach ($commentSets as $set) {
            $post = Post::query()->where('slug', $set['slug'] ?? '')->first();
            if (! $post) {
                continue;
            }

            foreach ($set['comments'] ?? [] as $row) {
                Comment::query()->updateOrCreate(
                    [
                        'post_id' => $post->id,
                        'author_name' => $row['author_name'] ?? 'Guest',
                        'body' => $row['body'] ?? '',
                    ],
                    [
                        'status' => $row['status'] ?? 'approved',
                    ]
                );
            }
        }
    }
}
