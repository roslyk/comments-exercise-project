<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostCommentController extends Controller
{

    public function store(Post $post)
    {

        // Validate the content of comment form
        $validatedBody = request()->validate(['body' => 'required']);
        // Error, if any, is sent back

        // dd($validatedBody);

        // Creating a comment from the logged in user
        $post->comments()->create([
            'user_id'   => auth()->user()->id,
           'body' => $validatedBody['body']
                                                ]);


        // Go back to the previous page/the show post page
        return  back();


    }


}
