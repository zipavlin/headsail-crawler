<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = [
        'name'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
