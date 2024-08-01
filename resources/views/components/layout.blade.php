<!DOCTYPE html>

<title>Comments Exercise Project</title>




<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body class="p-8">
{{-- p-8 gives us some padding --}}
    <div class="flex grid grid-cols-4">

        {{-- Link to the main page --}}
        <a class="text-xl" href="/">Go back to main page</a>

    @auth

        <div class="col-start-3">
           <nav class="mb-7 uppercase">{{ auth()->user()->name }} is logged in </nav>
        </div>

        <div class="col-start-4">
            <nav class="mb-7 hover:underline uppercase"><a href="/logout">Logout</a> </nav>
         </div>
    @endauth

    </div>




{{ $slot }}
<!-- The above means that what's
inside of "x-layout" in our views will
be inserted at this slot -->

    {{-- If a success flash message has been sent --}}
    @if (session('success'))

    <x-flash-message message="{{ session('success') }}"/>
    {{-- See "resources\views\components\flash-message.blade.php" --}}

    @endif

</body>
