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

    public function __construct($title, $excerpt, $date, $body, $slug){
        
        $this->title = $title;

        $this->excerpt = $excerpt;

        $this->date = $date;

        $this->body = $body;

        $this->slug = $slug;

    }
 public static function all(){ 

      // The return value from the innermost function is stored forever in
      // the cache using the key 'posts.all'.
      return cache()->rememberForever($key = 'posts.all', function () {

        return collect(File::files(resource_path("posts")))
              ->map(fn($file) => 
                  // Parse each file using YamlFrontMatterm, this way we get the title,
                  // excerpt, date, body and slug which are in the posts themselves.
                  // The output is stored in an array 
                YamlFrontMatter::parseFile($file)) // Getting an array for each file
              ->map(fn($document) =>   
                    // For each parsed file we get an array with title, excerpt, date, body and slug.   
                    // From these arrays we take each element and store them in a class 
                    // instantiation of Post (this class).
                    
                    new Post($document->title, 
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug)    
      )/*Now we have an array of arrays. 
      The outer most array contains five Post instantiations.
      The inner most arrays contains instantiations of the post classes.
      The variables title, excerpt, date, body and slug can be access via "->".
      And each of the five post instantiations can be sorted by date.
      */->sortByDesc('date');
                    // We sort the array of Post class instantiations be date.
      });
      

    }
public static function find($slug)
{

return static::all()->firstWhere('slug',$slug);

}

public static function findOrFail($slug)
{

$post = static::find($slug);

if (! $post){

  throw new ModelNotFoundException();
}

return $post;

}



}