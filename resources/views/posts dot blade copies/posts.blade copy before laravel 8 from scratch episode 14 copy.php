<!DOCTYPE html>

<title>My Blog</title>

<link rel="stylesheet" href="/app.css">
<!-- The above file is in the public folder-->

<!-- script src="/app.js"> </script> -->
<!-- The above file is in the public folder-->
    
<body>

    <?php foreach ($posts as $post) : ?>

      <article>
        <h1>
          <!-- Link to the post - See the second route-->
          <a href="/posts/<?= $post->slug; ?>">
          <!-- The title -->  
          <?= $post->title; ?> 
          </a>
          
        
        </h1>
      
      
        <div>
          <!-- The excerpt from the given post --> 
          <?= $post->excerpt; ?> 
        
        </div>
      
      
      </article>   
  <?php endforeach; ?>
    
</body> 