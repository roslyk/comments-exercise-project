<x-layout > <!-- See $slot at resources\views\components\layout.blade.php -->

    <!-- Iterate over $posts which is an array with 5 entries. 
    Each mentioned entry contains an array that holds information
  about a post. Posts can be found in resources\posts
-->
    @foreach ($posts as $post)
      <article class="{{ $loop->even ? 'foobar' : '' }}"  >
        <h1>
          <!-- Link to the post - See the second route-->
          <a href="/posts/{{ $post->id }}">
          <!-- The title -->            
          {{ $post->title}}
        
          </a>    
        
        </h1>      
      
        <div>
          <!-- The excerpt from the given post --> 
          {{ $post->excerpt }} 
        
        </div>     
      
      </article>   
  @endforeach

</x-layout>









