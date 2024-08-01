<x-layout > <!-- See $slot at resources\views\components\layout.blade.php -->

    {{-- This is the homepage/the center of this project --}}

    <div class="bg-white  rounded mb-2 w-full max-w-md">
        <header class=" center">

            <h1 class="text-3xl font-semibold mb-4 whitespace-nowrap" >

                <a href="/">Comments Exercise Project</a>
                {{-- {{http_build_query( request()->except('search','category','page') ) }} --}}
            </h1>

            <nav >
                <ul>
                    {{-- If the user is authenticated/logged in --}}
                    @auth
                        {{-- Greeting --}}
                        <li class="text-2xl mt-4 font-semibold mb-4 text-left text-blue-500" >
                            Hello, {{ auth()->user()->name }}!
                        </li>
                        {{-- Logout option --}}
                        <li class="text-2xl mt-4 font-semibold mb-4 text-left text-blue-500">
                            <a href="/logout">Logout!</a>
                        </li>
                    {{-- If the user is not logged in  --}}
                    @else
                        {{-- Log in option --}}
                        <li class="text-2xl mt-4 font-semibold mb-4 text-left text-blue-500">
                            <a href="/login">Log in</a>
                        </li>
                        {{-- Register option --}}
                        <li class="text-2xl font-semibold mb-4 text-left text-blue-500">
                            <a href="/register">Register</a>
                        </li>
                    @endauth
                </ul>
            </nav>

        </header>
    </div>


    {{-- Making a flexible grid with two columns and a gap between them  --}}
    <div class="grid flex grid-cols-2">


            {{-- 1st row, 1st column --}}
            {{-- Post search label --}}
            <div>
                <label class="text-xs"  for="search">Search in posts' titles</label>
            </div>

            {{-- 1st row, 2nd column --}}
            {{-- category search label --}}
            <div>
                <label class="text-xs" for="category">Search in posts' categories</label>
            </div>

            {{-- 2nd row, 1st column --}}
            {{-- post title search form and reset button--}}
            <div>

                {{-- The posts' title search form,
                            where category search is included,
                            if it exists --}}
                <form class="pr-5" method="GET" action="/">

                {{-- The hidden category input --}}
                <input type="hidden" name="category" value="{{ request('category') }}">


                {{-- The user's search in posts' titles --}}
                <input class="border" type="text" name="search" value="{{ request('search') }}">

                </form>

                {{-- When we clear this search, we want to make sure that we go to the
                    page where we only search for category (possibly empty). This search
                    in posts' title and the page we are on should not be regarded anymore  --}}
                <button class="text-xs bg-blue-500 text-white p-1 rounded">
                    <a href="?{{ http_build_query(request()->except('search','page')) }}">
                        Clear posts' title search
                    </a>
                </button>
            </div>


            {{-- 2nd row 2nd column --}}
            {{-- post category search and reset button --}}
            <div>
                    {{-- The form that takes a category search
                    entry along with posts' titles  search
                    entry, if it exists --}}
                <form  method="GET" action="/">

                    {{-- The hidden search input --}}
                    <input type="hidden" name="search" value="{{ request('search') }}">


                    {{-- The user's search in posts' categories  --}}
                    {{-- Should perhaps be a dropdown search --}}
                    <input class="border" type="text" name="category" value="{{ request('category') }}">

                </form>

                {{-- We must be sure to disregard both the current category and the current page
                    when we reset the category filter. When we remove this filter we want to go
                    back to the page that holds information about search in posts' titles
                    or the page with no filters --}}
                <button class="text-xs bg-blue-500 text-white p-1 rounded">
                    <a href="?{{ http_build_query(request()->except('category','page')) }}">
                        Clear category search
                    </a>
                </button>

            </div>

    </div>

    <div class="mt-5">
     <h2 class="text-2xl font-semibold mb-4" >
        Below you will find the posts
        </h2>

    </div>


    {{-- A flexible grid with 4 columns -
        FILLED IN COLUMN-WISE  --}}



        @if (count($posts))

            <x-posts-grid :posts="$posts"/>

        @else
                <p>This author has no posts</p>
        @endif



    {{-- The pagination links/links to other pages
        containing posts --}}
    {{ $posts->links() }}

</x-layout>









