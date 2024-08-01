<x-layout >


<x-slot name="content">
    @foreach ($posts as $post)
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
</x-slot>



</x-layout>









