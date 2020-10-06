<?php


namespace App\Support;


use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Str;

class Url extends Uri
{
    public function normalize(): string
    {
        return Str::of($this->getScheme() . "://" . $this->getHost() . $this->getPath())->finish('/');
    }

    public function getDomain(): string
    {
        return $this->getHost();
    }

    public function getParent(): ?string
    {
        switch ($this->getLevel()) {
            case 0:
                return null;
            case 1:
                return '/';
            default:
                return Str::of(
                    collect(explode('/', $this->getPath()))
                    ->filter()
                    ->take($this->getLevel() - 1)
                    ->join('/')
                )->start('/');
        }
    }

    public function getLevel(): int
    {
        return collect(explode('/', $this->getPath()))
            ->filter()
            ->count();
    }

    public function __toString(): string
    {
        return $this->normalize();
    }

    public function toArray(): array
    {
        return [
            'url' => $this->normalize(),
            'domain' => $this->getDomain(),
            'parent' => $this->getParent(),
            'level' => $this->getLevel()
        ];
    }
}
