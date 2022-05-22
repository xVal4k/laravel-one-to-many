<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'content',
        'image',
        'slug'
    ];

    static public function createSlug($arg)
    {
        $periodicSlug = Str::of($arg)->slug('-')->__toString();
        $slug = $periodicSlug;
        $_i = 1;
        while (self::where('slug', $slug)->first()) {
            $slug = "$periodicSlug-$_i";
            $_i++;
        }
        return $slug;
    }
}
