<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::query()->delete();

        Service::query()->insert([
            ['audience' => 'Authors', 'title' => 'Ghostwriting', 'href' => '/services/authors#ghostwriting', 'sort_order' => 1],
            ['audience' => 'Authors', 'title' => 'Book Promotional Blogs', 'href' => '/services/authors', 'sort_order' => 2],
            ['audience' => 'Authors', 'title' => 'Copyediting & Proofreading', 'href' => '/services/authors#copyediting', 'sort_order' => 3],
            ['audience' => 'Brands', 'title' => 'Website Content + Development', 'href' => '/services/brands', 'sort_order' => 4],
            ['audience' => 'Brands', 'title' => 'SEO + AEO Blogs', 'href' => '/services/brands', 'sort_order' => 5],
            ['audience' => 'Brands', 'title' => 'LinkedIn Ghostwriting', 'href' => '/services/brands', 'sort_order' => 6],
            ['audience' => 'Brands', 'title' => 'Thought Leadership & Ghostwriting', 'href' => '/services/brands', 'sort_order' => 7],
            ['audience' => 'Brands', 'title' => 'Copyediting & Editorial Support', 'href' => '/services/brands', 'sort_order' => 8],
        ]);
    }
}
