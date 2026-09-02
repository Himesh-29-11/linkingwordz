<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkItem extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category',
        'client',
        'role',
        'text',
        'image',
        'result',
        'body',
        'sort_order',
    ];

    protected function casts(): array
    {
        return ['sort_order' => 'integer'];
    }

    public function toPublicArray(): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'category' => $this->category,
            'client' => $this->client,
            'role' => $this->role,
            'text' => $this->text,
            'image' => $this->image,
            'result' => $this->result,
            'body' => $this->body,
        ];
    }
}
