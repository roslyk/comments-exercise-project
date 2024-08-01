


<div class="space-x-2 col-start-2 border bg-gray-100">
    {{-- The author/user's image --}}
    <img class="rounded object-cover w-72 h-72" src="https://i.pravatar.cc/150?u={{ $post->user_id }}"  alt="">

        <button class="px-1 bg-blue-500 mb-1 text-xs rounded text-gray-100">
            <a href="/?category={{ $post->category->name }}">{{ $post->category->name }}</a>
        </button>
    <p>
    {{$post->created_at->diffForHumans() }}
    </p>

    <p class="font-semibold underline">
        <a href="/?author={{ $post->author->username }}">{{ $post->author->username }}</a>
    </p>


</div>
