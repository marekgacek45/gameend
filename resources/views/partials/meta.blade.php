<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $title }} - gameend</title>
<meta name="description" content="{{ $description }}">

<meta name="keywords" content="keyword1, keyword2, keyword3">
<meta name="author" content="Author Name">

@if ($noFollow)
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
@endif

<link rel="canonical" href="{{ url()->current() }}" />

<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="https://www.gameend.pl">
<meta property="og:type" content="website">
<meta property="og:image" content="">
