<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['quote', 'name', 'role', 'avatar', 'context', 'payload', 'sort_order'];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'sort_order' => 'integer',
        ];
    }
}
