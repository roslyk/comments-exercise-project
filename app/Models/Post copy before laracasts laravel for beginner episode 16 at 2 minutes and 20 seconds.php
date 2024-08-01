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

      // If the $key is set in the cache already then do nothing
      // If the $key is not set in the cache then the $key is set to
      // the innermost return value below
      return cache()->rememberForever($key = 'posts.all', function () {

        return collect(File::files(resource_path("posts")))
              ->map(fn($file) => 
                  // Parse the file using YamlFrontMatterm, this way we get the title,
                  // excerpt, date, body and slug which are in the posts themselves 
                YamlFrontMatter::parseFile($file)) // Getting an array of documents for each file
              ->map(fn($document) =>      
                    // We store various document attributes these attributes in a class object.
                    // This class is called Post. This class stores the title, excerpt, date,
                    // body and slug.
                    new Post($document->title, 
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug)    
      )->sortByDesc('date');
                    // We sort the array by date
      });
      

    }
public static function find($slug)
{

// $posts = static::all();

//return $posts->firstWhere('slug',$slug);

// Returning the object that has slug variable equal to $slug

// Take the output from static::all() and take
// the first element in the array of arrays
// that 'slug' equal to $slug

$post = static::all()->firstWhere('slug',$slug);

if (! $post){
throw new ModelNotFoundException();
}

return $post;

}
public static function findOrFail($slug)
{
  $post = static::all()->firstWhere('slug',$slug);

if (! $post){
throw new ModelNotFoundException();
}

return $post;

}


}