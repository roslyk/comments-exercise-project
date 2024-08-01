<!DOCTYPE html>

<title>My Blog</title>

<link rel="stylesheet" href="/app.css">
<!-- The file above in the public folder-->
    
<body>
    <article>
       
    <h1> <?= $post->title; ?> </h1>


    <div>
          <!-- The body from the given post --> 
          <?= $post->body; ?>
        
    </div>

        
    </article>

    
  
<a href="/">Go back</a>    
</body>