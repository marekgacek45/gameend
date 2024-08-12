<div class="flex py-8 px-8  gap-8">
    {{-- FILTERS --}}
<div class="w-2/12 ] space-y-6">
    {{-- Categories --}}
    <x-filter-box title="Kategorie" >

        @foreach($this->categories as $category)
       <x-filter-item  :key="'category-' . $category->id" :item="$category" href="#"/>
        @endforeach
      </x-filter-box>
      {{-- Tags --}}
    <x-filter-box title="Tagi">

        @foreach($this->tags as $tag)
       <x-filter-item  :key="'tag-' . $tag->id" :item="$tag" href="#"/>
        @endforeach
      </x-filter-box>
</div>
 {{-- CONTENT --}}
<div class="w-8/12 ">
<header class="h-[30vh] bg-yellow-300 rounded-xl">
   <div>

   </div>
</header>
<main>
    <div class="flex justify-between">
        <div>

            <h2>Artykuły</h2><span>{{$this->posts->count()}}</span>
        </div>
<div>
    szukaj
</div>

    </div>

    <div class="grid grid-cols-3">
        @foreach($this->posts as $post)
        <x-base.card>
            <div>
                <img src="{{asset($post->getThumbnailUrl())}}" alt="miniaturka artykułu o tytule {{$post->title}}" class="w-full h-full rounded-xl object-cover">
            </div>
            <div>
                @php
                $category = $post->categories->first();
            @endphp
            
            @if($category)
                <p>{{ $category->title }}</p>
            @else
                <p>Brak kategorii</p> <!-- lub inny komunikat, który chcesz wyświetlić -->
            @endif
                <h2>{{$post->title}}</h2>
            </div>
        </x-base.card>
        @endforeach
    </div

</main>
</div>
    {{-- FILTERS --}}
    <div class="w-2/12 space-y-6">
        {{-- Categories --}}
        <x-filter-box title="Ukończone gry">
    
            @foreach($this->completedGames as $game)
           <x-filter-item  :key="'completed-game-' . $game->id" :item="$game" href="#"/>
            @endforeach
          </x-filter-box>
          {{-- Tags --}}
        <x-filter-box title="Top of the Top">
    
            @foreach($this->topGames as $game)
           <x-filter-item  :key="'top-game-' . $game->id" :item="$game" href="#"/>
            @endforeach
          </x-filter-box>
    </div>
  
</div>