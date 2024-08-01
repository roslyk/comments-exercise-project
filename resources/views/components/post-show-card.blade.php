<div class="border bg-gray-100 col-span-3">


    <h1 class="font-bold text-2xl mb-2" > {!! $post->title !!} </h1>

    <p class="font-bold text-xl mb-2">
        {!! $post->excerpt !!}
    </p>

    <p class="mb-2 text-left mr-16  col-start-5">
        <!-- The body from the given post -->
        {!!  $post->body !!}

    </p>

</div>
