<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="@stack('html-class')">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    @stack('head-after')
</head>

<body @guest style="padding: 0" @endguest>
    <div id="app">
        @guest
            @yield('content')
        @else
            @component('layouts.navbar')

            @endcomponent
            <aside class='menu has-background-grey-dark is-hidden-touch el-sticky '>
                <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li>
                        <a href='{{ route('home') }}'>Home</a>
                    </li>
                    <li>
                        <a id="header-toggle">Author
                            <i class="fas fa-chevron-down ignore"></i>
                        </a>
                        <ul class='is-hidden'>
                            <li><a href='{{ route('author.index') }}'>Author list</a></li>
                            <li><a href='{{ route('author.create') }}'>Add new author</a></li>
                        </ul>
                    </li>
                    <li>
                        <a id="header-toggle">Book
                            <i class="fas fa-chevron-down ignore"></i>
                        </a>
                        <ul class='is-hidden'>
                            <li><a href='{{ route('book.index') }}'>Book list</a></li>
                            <li><a href='{{ route('book.create') }}'>Add new bet</a></li>
                        </ul>
                    </li>
            </aside>
            <div class="section">

                <div class="columns is-centered is-multiline">
                    @yield('content')
                </div>
            </div>
        @endguest
    </div>
    @stack('bottom')

</body>

</html>
