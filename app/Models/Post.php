<?php

namespace app\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $slug;
    public $date;
    public $excerpt;

    public $body;
    public function __construct($title, $slug, $date, $excerpt, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->body = $body;
    }

    public static function all()
    {
        return cache()->rememberForever("posts.all", function () {
            return collect(File::files(resource_path("/posts")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn ($document) =>
                    $posts[] = new Post(
                        $document->title,
                        $document->slug,
                        $document->date,
                        $document->excerpt,
                        $document->body()
                    )
                )->sortByDesc('date');
        });
    }
    public static function find($slug)
    {
        return self::all()->firstWhere("slug", $slug);
    }
    public static function findOrFail($slug)
    {
        $posts = self::find($slug);
        if (!$posts) {
            return abort(404);
        }
        return $posts;
    }
}
