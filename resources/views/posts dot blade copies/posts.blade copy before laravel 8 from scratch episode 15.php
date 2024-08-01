<!DOCTYPE html>

<title>My Blog</title>

<link rel="stylesheet" href="/app.css">
<!-- The above file is in the public folder-->


<link rel="stylesheet" href="/vendor-lib.css">
<!-- script src="/app.js"> </script> -->
<!-- The above file is in the public folder-->
    
<body>

@if (2==2)
sadasd
@endif

@unless (2==1)
adsadsadsdas
@endunless
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

  
    
</body> 