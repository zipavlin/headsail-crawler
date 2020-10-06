<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'url',
        'crawled'
    ];

    protected $casts = [
        'crawled' => 'boolean'
    ];
}
