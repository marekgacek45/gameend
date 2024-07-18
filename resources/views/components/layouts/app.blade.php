@props(['title', 'description', 'noFollow' => false])

<!DOCTYPE html>
<html lang="pl">

<head>
    @include('partials.meta')
    @include('partials.fonts')
    @include('partials.favicon')

    @vite('resources/css/app.css')
</head>

<body class="overflow-x-hidden bg-primary-800 font-text text-fontPrimary ">
    {{ $slot }}


    @vite('resources/js/app.js')
</body>

</html>
