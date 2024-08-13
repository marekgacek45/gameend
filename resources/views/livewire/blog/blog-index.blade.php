<div class="flex py-8 px-8  gap-8">
    {{-- FILTERS --}}
    <div class="w-3/12 space-y-6">
        {{-- Categories --}}
        <x-filter-box title="Kategorie">

            @foreach($this->categories as $category)
            <x-filter-item :key="'category-' . $category->id" :item="$category" href="#" />
            @endforeach
        </x-filter-box>
        {{-- Tags --}}
        <x-filter-box title="Tagi">

            @foreach($this->tags as $tag)
            <x-filter-item :key="'tag-' . $tag->id" :item="$tag" href="#" />
            @endforeach
        </x-filter-box>
        {{-- Completed Games --}}
        <x-filter-box title="Ukończone gry">

            @foreach($this->completedGames as $game)
            <x-filter-item :key="'game-' . $game->id" :item="$game" href="#" />
            @endforeach
        </x-filter-box>
        {{-- Top Games --}}
        <x-filter-box title="Top of the Top">

            @foreach($this->topGames as $game)
            <x-filter-item :key="'game-' . $game->id" :item="$game" href="#" />
            @endforeach
        </x-filter-box>
    </div>
    {{-- CONTENT --}}
    <div class="w-9/12 space-y-12 ">

        <header class="swiper featured-posts-slider h-[50vh]  rounded-xl">
            <div class="swiper-wrapper">
                @foreach ($this->featuredPosts as $post)

                <div class="  swiper-slide bg-center bg-no-repeat bg-cover bg-blend-multiply bg-gray-400  p-12"
                    style="background-image: url({{$post->getThumbnailUrl()}})">

                    <div class="w-3/5 h-full flex flex-col justify-end items-start gap-6">
                        <h1 class="text-5xl font-semibold">

                            {{$post->title}}
                        </h1>
                        <p class="text-lg">{{$post->getExcerpt()}}</p>
                        <x-base.link-btn class="self-start mt-4" href="#">zobacz</x-base.link-btn>
                    </div>
                </div>

                @endforeach

            </div>

        </header>

        <main class="space-y-6">
            <div class="flex justify-between items-center">
                <div class="flex  items-end gap-3">

                    <h2 class="text-5xl font-semibold">Artykuły</h2><span
                        class="text-xl text-gray-400">({{$this->postsCount}})</span>
                </div>
                <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
                    <div class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <input wire:model.live.debounce.1000ms="search" type="text" placeholder="Szukaj..."
                            class=" ml-2 rounded-full border-2 border-secondary-400 px-4 py-2 hover:bg-gray-100 text-primary-400 " />
                    </div>

                </div>

            </div>

            <div class="grid grid-cols-3 gap-8">
                @foreach($this->posts as $post)
                <x-base.card class="group p-0">

                    {{-- THUMBNAIL --}}
                    <div class="overflow-hidden rounded-t-xl">
                        <img src="{{asset($post->getThumbnailUrl())}}"
                            alt="miniaturka artykułu o tytule {{$post->title}}"
                            class="w-full  rounded-t-xl object-cover h-[250px] group-hover:scale-110 duration-500">
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-6 flex flex-col  gap-6 ">
                        {{-- title --}}
                        <h2 class="text-2xl line-clamp-2 border-b border-gray-400 h-[80px] font-semibold">
                            {{$post->title}}</h2>
                        {{-- excerpt --}}
                        <p class="text-sm text-gray-400 group-hover:text-fontPrimary duration-500 line-clamp-4">
                            {{$post->getExcerpt()}}</p>
                        {{-- links --}}
                        <div class="flex justify-between items-center ">
                            {{-- links--categories --}}
                            <div class="flex justify-start items-center gap-4 mt-2">
                                @foreach ($post->categories as $category)
                                <a wire:navigate href="#"><img src="{{asset($category->getThumbnailUrl())}}"
                                        alt="miniaturka artykułu o tytule {{$post->title}}"
                                        class="w-7 h-7 rounded-xl object-cover hover:scale-110 duration-500"></a>
                                @endforeach
                            </div>
                            {{-- links--post --}}
                            <a wire:navigate href="#" class="bg-secondary-400 hover:bg-primary-200 duration-500 rounded-full px-6 py-1 ">Czytaj</a>
                        </div>
                    </div>

                </x-base.card>
                @endforeach
            </div>
        
        {{$this->posts->links()}}
        </main>
    </div>
    {{-- FILTERS --}}
    {{-- <div class="w-2/12 space-y-6">

        <x-filter-box title="Ukończone gry">

            @foreach($this->completedGames as $game)
            <x-filter-item :key="'completed-game-' . $game->id" :item="$game" href="#" />
            @endforeach
        </x-filter-box>

        <x-filter-box title="Top of the Top">

            @foreach($this->topGames as $game)
            <x-filter-item :key="'top-game-' . $game->id" :item="$game" href="#" />
            @endforeach
        </x-filter-box>
    </div> --}}
    {{-- Categories --}}

</div>