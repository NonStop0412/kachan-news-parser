<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    public static function create(string $name, string $link): self
    {
        $source = new self;
        $source->name = $name;
        $source->url = $link;
        $source->save();

        return $source;
    }

    public function edit(string $name, string $url): self
    {
        $this->name = $name;
        $this->url = $url;
        $this->save();

        return $this;
    }

    public function deactivate()
    {
        $this->is_active = 0;
        $this->save();

        return $this;
    }

    public function activate()
    {
        $this->is_active = 1;
        $this->save();

        return $this;
    }

    public static function getId(string $url)
    {
        return self::where('url', $url)->first()->id;
    }

    public static function getName(int $id)
    {
        return self::where('id', $id)->first()->name;
    }

}
