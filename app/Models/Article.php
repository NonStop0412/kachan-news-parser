<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function unloading(array $feeds)
    {
        foreach ($feeds as $key => $value) {
            $feed = new Article();
            $feed->title = $value['title'];
            $feed->url = $value['url'];
            $feed->published_date = $value['published_date'];
            $feed->image = $value['image'];
            $feed->source_id = $value['source_id'];
            try {
                $feed->save();
            } catch (\Illuminate\Database\QueryException $e) {
                continue;
            }

        }
    }
}
