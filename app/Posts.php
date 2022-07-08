<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Posts extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content'
    ];

    public static function generateSlug($title){

        $slug = Str::slug($title, '-');
        $slug_base = $slug;

        $post_presente = Posts::where('slug', $slug)->first();
        $c = 1;

        while($post_presente){
            $slug = $slug_base . '-' . $c;
            $c++;
            $post_presente = Posts::where('slug', $slug)->first();
        }

        return $slug;
    }
}
