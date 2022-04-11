<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ $title ?? config('app.name') }}</title>
    <meta name="description" content="{{ $description ?? __("Test Sigmetix project")}}">


    <!-- CDN for fast implement -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    @stack('css')

</head>
<body class="container bg-light">

<main>
    <div class="container main-container-wrap  rounded py-3 my-3">
        @yield('content')
    </div>
</main>

<script src="{{ asset("js/main.js") }}"></script>
@stack('js')


</body>
</html>
