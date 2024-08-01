<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;


    // protected $guarded = [];


    protected $with = ["author", "category", "comments" ];


    public function scopeFilter($query, array  $filters)
    {

    // dd($filters);

     $query->when($filters['search'] ?? null,

                            fn($query,$search) =>
                            // Altering the post query so that we only get the posts
                            // where the title is like/contains $search
                                    $query->where('title','like','%'. $search . '%' ) );


    // dd($query);

    $query->when($filters['category'] ?? null,
                    fn($query, $category) =>
                    // Take the posts that has a category(
                    // they all do), And thereafter take the
                    // posts where the category name is like
                    // $category
                        $query->whereHas('category', fn($query) =>
                            $query->where('name', 'like', '%'. $category. '%') ));

    // dd($query);

    $query->when($filters['author'] ?? null,
                // Take the posts that has an author/user
                // and then take the ones where the username is like
                // $author
                fn($query, $author) => $query->whereHas('author', fn($query) =>
                 $query->where('username', 'like', "%" . $author )));

    return $query;


    }

    public function author()
    {


        return $this->belongsTo(User::class, 'user_id');

    }

    public function category()
    {

        return $this->belongsTo(Category::class);


    }
    public function comments()
    {

        return $this->hasMany(Comment::class);



    }

}
