<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'class',
        'utility',
        'group',
        'variant',
        'is_tailwind',
    ];

    protected $casts = [
        'is_tailwind' => 'boolean',
        'variant' => 'array'
    ];

    public function node()
    {
        return $this->belongsTo(Node::class);
    }

    public function scopeTailwind($query)
    {
        return $query->whereIsTailwind(true);
    }
}
