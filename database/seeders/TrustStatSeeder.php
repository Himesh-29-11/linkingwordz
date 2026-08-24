<?php

namespace Database\Seeders;

use App\Models\TrustStat;
use Illuminate\Database\Seeder;

class TrustStatSeeder extends Seeder
{
    public function run(): void
    {
        TrustStat::query()->delete();

        TrustStat::query()->insert([
            ['label' => '9+ Years Experience', 'detail' => 'Linguistics, content & writing', 'icon' => 'badge', 'sort_order' => 1],
            ['label' => 'M.Phil in Management', 'detail' => 'Research-led editorial work', 'icon' => 'graduate', 'sort_order' => 2],
            ['label' => 'Core Expertise', 'detail' => 'Finance · Technology · Education', 'icon' => 'layers', 'sort_order' => 3],
            ['label' => '5–10 Clients at a Time', 'detail' => 'Personal attention, not a queue', 'icon' => 'people', 'sort_order' => 4],
        ]);
    }
}
