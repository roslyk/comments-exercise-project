@extends('components/layout')

@section('content')

    <article>
       
    <h1> {{  $post->title }} </h1>


    <div>
          <!-- The body from the given post --> 
          {!!  $post->body !!}
        
    </div>

        
    </article>

    
  
<a href="/">Go back</a>

@endsection

