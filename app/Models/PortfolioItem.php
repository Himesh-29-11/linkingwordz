<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = [
        'client_name',
        'photo',
        'website_url',
        'summary',
        'documents',
        'sort_order',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'documents' => 'array',
            'sort_order' => 'integer',
            'is_published' => 'boolean',
        ];
    }

    public function toPublicArray(): array
    {
        return [
            'id' => $this->id,
            'client_name' => $this->client_name,
            'photo' => $this->photo,
            'website_url' => $this->website_url,
            'summary' => $this->summary,
            'documents' => $this->documents ?? [],
        ];
    }
}
