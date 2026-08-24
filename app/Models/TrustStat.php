<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrustStat extends Model
{
    protected $fillable = ['label', 'detail', 'icon', 'sort_order'];

    protected function casts(): array
    {
        return ['sort_order' => 'integer'];
    }
}
