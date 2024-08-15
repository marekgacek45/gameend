@props(['class' => ''])

<ul class="{{$class}} mb-[4px] ">

    <x-shared.nav.nav-item href="{{ route('blog.index') }}"
        class="{{ Route::currentRouteName() === 'blog.index' ? 'text-secondary-400' : '' }}">
        Posty
    </x-shared.nav.nav-item>

    <x-shared.nav.nav-item href="#"
        class="{{ Route::currentRouteName() === 'video.index' ? 'text-secondary-400' : '' }}">
        Filmy
    </x-shared.nav.nav-item>

    <x-shared.nav.nav-item href="{{ route('topOfTheTop.blog.index') }}"
        class="{{ Route::currentRouteName() === 'topOfTheTop.blog.index' ? 'text-secondary-400' : '' }}">
        Top Games
    </x-shared.nav.nav-item>

    <x-shared.nav.nav-item href="{{ route('completedGames.blog.index') }}"
        class="{{ Route::currentRouteName() === 'completedGames.blog.index' ? 'text-secondary-400' : '' }}">
        Ukończone gry
    </x-shared.nav.nav-item>

</ul>