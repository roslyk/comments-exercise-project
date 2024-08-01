<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

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

     /*return File::files(resource_path("posts/"));;*/
    
    $files =  File::files(resource_path("posts/")) ; 

     /* return array_map(function($file) {
        return  $file->getContents();
     } , $files); */
     
     // Returning an array with file_get_contents applied to
     // all of the elements of $files

      return array_map(fn($file) =>  $file->getContents(), 
     $files);  
    }
public static function find($slug){

 if (!file_exists($path = resource_path("/posts/{$slug}.html")) ) {

    throw new ModelNotFoundException(); 

    }   
     
    return cache()->remember("posts.{$slug}", 
        60*20 , 
        fn() => file_get_contents($path) );
    
    }   

}