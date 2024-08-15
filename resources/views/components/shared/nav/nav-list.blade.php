@props(['class' => ''])

<ul class="{{$class}} mb-[4px] ">

    <x-shared.nav.nav-item href="{{ route('post.index') }}"
        class="{{ Route::currentRouteName() === 'post.index' ? 'text-secondary-400' : '' }}">
        Posty
    </x-shared.nav.nav-item>

    <x-shared.nav.nav-item href="#"
        class="{{ Route::currentRouteName() === 'video.index' ? 'text-secondary-400' : '' }}">
        Filmy
    </x-shared.nav.nav-item>

    <x-shared.nav.nav-item href="{{ route('topOfTheTop.post.index') }}"
        class="{{ Route::currentRouteName() === 'topOfTheTop.post.index' ? 'text-secondary-400' : '' }}">
        Top Games
    </x-shared.nav.nav-item>

    <x-shared.nav.nav-item href="{{ route('completedGames.post.index') }}"
        class="{{ Route::currentRouteName() === 'completedGames.post.index' ? 'text-secondary-400' : '' }}">
        Ukończone gry
    </x-shared.nav.nav-item>

</ul>