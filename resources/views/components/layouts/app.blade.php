@props(['title', 'description', 'noFollow' => false])

<!DOCTYPE html>
<html lang="pl">

<head>
    @include('partials.meta')
    @include('partials.fonts')
    @include('partials.favicon')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="p-3 bg-primary-800 font-text text-fontPrimary overflow-x-hidden ">


    <x-shared.nav.navbar />



    {{ $slot }}



</body>

</html>
