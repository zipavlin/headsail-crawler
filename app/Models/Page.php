<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'url',
        'domain',
        'parent',
    ];

    protected $casts = [
        'crawled_at' => 'timestamp',
        'level' => 'integer'
    ];

    public function nodes()
    {
        return $this->hasMany(Node::class);
    }

    public function properties()
    {
        return $this->hasManyThrough(Property::class, Node::class);
    }

    public function scopeValid($query)
    {
        return $query->whereNotNull('crawled_at');
    }

    public static function getUrlParts(string $url)
    {
        $url_parts = parse_url($url);
        if (!array_key_exists('host', $url_parts)) {
            $url_parts = parse_url("http://$url");
        }
        $base = ($url_parts['scheme'] ?? 'http').'://'.$url_parts['host'];
        $path = (string) Str::of($url_parts['path'] ?? '')->trim('/');
        $level = empty($path) ? 0 : count(explode('/', $path));
        if ($level > 0) {
            $parent_path = array_slice(explode('/', $path), 0, -1);
            $parent = (string) Str::of($base.'/'.implode('/', $parent_path))->finish('/');
        }
        return (object) [
            'host' => $url_parts['host'],
            'base' => $base,
            'path' => $path,
            'full' => (string) Str::of($base.'/'.$path)->finish('/'),
            'level' => $level,
            'parent' => $parent ?? null
        ];
    }

    protected static function booting()
    {
        parent::creating(static function (Page $model) {
            $url = self::getUrlParts($model->url);
            $model->url = $url->full;
            $model->domain = $url->host;
            $model->level = $url->level;
            $model->parent = $url->parent;
        });
    }
}
