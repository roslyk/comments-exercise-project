<div class="grid space-x-0 flex md:grid-cols-6 lg:grid-cols-8">
    {{-- Displaying all posts --}}
    @foreach ($posts as $post)

        <x-post-card :post="$post"/>

    @endforeach

</div>
