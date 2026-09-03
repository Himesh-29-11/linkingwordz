<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
    protected $fillable = ['slug', 'title', 'body', 'sections'];

    protected function casts(): array
    {
        return [
            'sections' => 'array',
        ];
    }
}
