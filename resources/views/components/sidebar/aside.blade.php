@props(['categories', 'completedGames', 'topGames', 'movie'=>false])

<aside class="hidden xl:block w-3/12 space-y-6">
    {{-- Categories --}}
    <x-sidebar.panel title="Kategorie">
        @foreach($categories as $index => $category)
        <x-sidebar.filter wire:click="setCategory('{{$category->slug}}')" filter="category" :item="$category" />
        @endforeach
    </x-sidebar.panel>

    {{-- Completed Games --}}
    <x-sidebar.panel title="Ukończone gry">

        @foreach($completedGames as $index => $game)


        <x-sidebar.link movie target="_blank" rel="noreferrer nofollow" :item="$game"
            href="{{ $movie ? $game->movies->first()->link : route('blog.show', $game->posts->first()->slug) }}" />


        @if (($index + 1) % 6 == 0 && !$movie)
        <li class="w-full flex justify-center">
            <x-base.link-btn small href="{{route('completedGames.blog.index')}}">Zobacz wszystkie</x-base.link-btn>
        </li>

        @endif
        @endforeach
    </x-sidebar.panel>
    {{-- Top Games --}}
    <x-sidebar.panel title="Top of the Top">

        @foreach($topGames as $index => $game)
        <x-sidebar.link movie target="_blank" rel="noreferrer nofollow" :item="$game"
            href="{{ $movie ? $game->movies->first()->link : route('blog.show', $game->posts->first()->slug) }}" />

        @if (($index + 1) % 6 == 0 && !$movie)
        <li class="w-full flex justify-center">
            <x-base.link-btn small href="{{route('topOfTheTop.blog.index')}}">Zobacz wszystkie</x-base.link-btn>
        </li>
        @endif
        @endforeach
    </x-sidebar.panel>
</aside>