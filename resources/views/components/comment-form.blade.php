<div class="col-span-1 border bg-gray-100">
    <img class="rounded object-cover" src="https://i.pravatar.cc/150?u={{ auth()->user()->id }}"  alt="">

    <p class="font-semibold underline">
        <a href="/?author={{ auth()->user()->username }}">{{ auth()->user()->username }}</a>
    </p>

</div>

<div class="col-span-2 ">
    {{-- Comment form --}}
    <form class="" method="Post" action="/posts/comments/{{ $post->slug }}" >

    {{-- Remembering Cross Site Request Forgery Protection --}}
    @csrf

    {{--  The box where the authenticated user can write a comment --}}
    <textarea class="border  w-full mb-3 bg-gray-200 "
            name="body"  cols="70" rows="7"
            placeholder="Write your comment here!">

    </textarea>

    {{-- The submit button --}}
    <button class="px-2 uppercase rounded-xl bg-blue-500
    hover:bg-blue-700 border-black text-white "
    type="submit">
    Post
    </button>

    </form>

    {{-- The potential error --}}
    {{-- An error will be thrown if the textarea is empty! --}}
    @error('body')

    <p class="text-xs text-red-600">{{ $message }}</p>

    @enderror
</div>
