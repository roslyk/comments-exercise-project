



    {{-- 1st and 3rd elements in row--}}
    <div class="border mb-2">
        <img class="rounded-xl" src="https://i.pravatar.cc/150?u={{ $post->user_id }}" alt=""
        width="200" height="100">
        <button class="p-1  bg-blue-500 mb-1 text-xs rounded text-gray-100">
            <a href="/?category={{ $post->category->name }}">{{ $post->category->name }}</a>
        </button>
        <br>
        {{ $post->created_at->diffForHumans() }}
        <br>
        <a href="?author={{ $post->author->username }}">
            <p class="hover:underline hover:text-blue-500 font-semibold">{{ $post->author->username }}</p>
        </a>
    </div>

    {{-- 2nd and 4th element in row  --}}

    {{-- class="flex flex-col mb-2 border bg-gray-100" --}}
    <div class ="items-start mb-2 mr-4 bg-gray-100">

            <!-- Link to the post, via its id. See the second route-->
            <a class=" font-bold hover:underline hover:text-blue-500" href="/posts/{{ $post->slug }}">
                <!-- The title -->
                {!! $post->title!!}
            </a>

            <p>
                {!! $post->excerpt!!}

            </p>

    </div>


