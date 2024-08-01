<div class="border-t mt-1 bg-gray-100 border col-span-1">

    <img class="object-cover rounded" height="100"  src="https://i.pravatar.cc/150?u={{ $comment->user_id }}"  alt="">

    {{-- When was the comment posted --}}
    <h1 class="font-bold text-xs" > Posted {!! $comment->created_at->diffForHumans() !!} </h1>

    {{-- username of comments author --}}

    <a href="/?author={{ $comment->author->username }}">
        <p class="font-semibold underline mb-4 ">{{ $comment->author->username }}</p>
    </a>
</div>

<div class="border-t mt-1  border col-span-2">

    {{-- The body of the comment --}}
    <p class=" mb-4 text-xs" > {!! $comment->body !!} </p>

</div>




