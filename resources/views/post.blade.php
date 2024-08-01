<x-layout> <!-- See $slot at resources\views\components\layout.blade.php -->



    <article>

        <div class="flex grid  grid-cols-5 ">

                <x-post-attributes :post="$post"/>

                <x-post-show-card :post="$post"/>




            {{-- The comment form is only for authenticated users --}}
            @auth


            <div class="col-span-3 col-start-3 grid grid-cols-3 gap-4">

                    <div class="col-span-3">
                        <h1 class="font-bold mb-2 text-xl" > Comment on this post below </h1>
                    </div>


                    <div class="col-span-3 flex grid grid-cols-3">

                        <x-comment-form :post="$post"/>


                        @else
                        {{-- If the user/visitor is not authenticated! --}}

                        <div class="col-span-3 mb-4">

                            <a class="hover:underline mb-3" href="/register">Register</a> or <a class="hover:underline" href="/login">log in</a> to comment on this post!

                        </div>


                        @endauth
                        {{-- displaying all the comments --}}




                        {{-- Displaying comments in a loop --}}
                        @foreach ($post->comments as $comment)

                        {{-- flexible grid w. 2 columns --}}

                            <x-comment :comment="$comment" />


                        @endforeach

                    </div>




            </div>

        </div>



    </article>






</x-layout>
