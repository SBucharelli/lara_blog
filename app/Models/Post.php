<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title    = $title;
        $this->excerpt  = $excerpt;
        $this->date     = $date;
        $this->body     = $body;
        $this->slug     = $slug;
    }


    public static function allPosts()
    {
        /* 
        Find all of the files in posts directory and collect them into a collection.
        Then, loop over each item in that collection, and parse each file into a document.
        Lastly, with the new collection of documents, loop over each doc into a new Post object.
        */

        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })
                ->sortByDesc('date');
        });
    }


    public static function find($slug)
    {
        return static::allPosts()->firstWhere('slug', $slug);
    }
}
