@extends('layout') <!-- see layout.blade.php -->

<!-- @section('banner')

 <h1> My blog </h1>

@endsection
-->

@section('content')

@foreach ($posts as $post) 
<!-- see @yield('content') in layout.blade.php  -->


<article class="{{ $loop->even ? 'foobar' : '' }}"  >
  <h1>
    <!-- Link to the post - See the second route-->
    <a href="/posts/{{ $post->slug }}">
    <!-- The title -->  
    <?php //echo $post->title; ?> 
    {{ $post->title}}
  
    </a>

  

    

    
  
  </h1>


  <div>
    <!-- The excerpt from the given post --> 
    {{ $post->excerpt }} 
  
  </div>


</article>   
@endforeach

@endsection

