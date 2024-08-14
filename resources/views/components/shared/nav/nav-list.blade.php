@props(['class' => ''])

<ul class="{{$class}} mb-[4px] ">
    
    <x-shared.nav.nav-item href="{{route('post.index')}}">Posty</x-shared.nav.nav-item>
    <x-shared.nav.nav-item href="#">Filmy</x-shared.nav.nav-item>
    <x-shared.nav.nav-item href="{{route('topOfTheTop.post.index')}}">Top Games</x-shared.nav.nav-item>
    <x-shared.nav.nav-item href="{{route('completedGames.post.index')}}">Ukończone gry</x-shared.nav.nav-item>
   
</ul>