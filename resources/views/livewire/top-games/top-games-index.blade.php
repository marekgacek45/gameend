<div class="flex py-8 px-2 md:px-8  gap-8">
    {{-- FILTERS --}}
    <div class="hidden xl:block w-3/12 space-y-6">
        {{-- Categories --}}
        <x-filter-box title="Kategorie">

            @foreach($this->categories as $index => $category)
            <x-filter-item postCount filter="category" :item="$category"
                href="{{ route('home', ['category' => $category->slug]) }}" />
            @endforeach


        </x-filter-box>
      
        {{-- Completed Games --}}
        <x-filter-box title="Ukończone gry">

            @foreach($this->completedGames as $index => $game)
            <x-filter-item filter="completedGame" :item="$game" href="{{route('post.show', $game->slug)}}" />

            @if (($index + 1) % 6 == 0)
            <li class="w-full flex justify-center"><a wire:navigate href="{{route('completedGames.post.index')}}"
                    class="bg-secondary-400 hover:bg-primary-200 duration-500 rounded-full px-6 py-1 mt-3">Zobacz
                    wszystkie</a></li>
            @endif
            @endforeach
        </x-filter-box>
        {{-- Top Games --}}
        <x-filter-box title="Top of the Top">

            @foreach($this->topGames as $index => $game)
            <x-filter-item filter="topGame" :item="$game" href="{{route('post.show', $game->slug)}}" />

            @if (($index + 1) % 6 == 0)
            <li class="w-full flex justify-center"><a wire:navigate href="{{route('topOfTheTop.post.index')}}"
                    class="bg-secondary-400 hover:bg-primary-200 duration-500 rounded-full px-6 py-1 mt-3">Zobacz
                    wszystkie</a></li>
            @endif
            @endforeach
        </x-filter-box>
    </div>
    {{-- CONTENT --}}
    <div class="w-full xl:w-9/12 space-y-12 ">

        
        <header class="swiper featured-posts-slider h-[75vh]  sm:h-[55vh]  rounded-xl group">
            <div class="swiper-wrapper">
                @foreach ($this->featuredPosts as $post)

                <div class=" swiper-slide bg-center bg-no-repeat bg-cover bg-blend-multiply bg-gray-500   p-12"
                    style="background-image: url({{$post->getThumbnailUrl()}})">

                    <div class="w-5/5 md:w-4/5 2xl:w-3/5 h-full flex flex-col justify-end items-start gap-6">
                        <h1 class="text-3xl sm:text-4xl 2xl:text-5xl font-semibold">

                            {{$post->title}}
                        </h1>
                        <p class="line-clamp-4 2xl:line-clamp-none text-lg">{{$post->getExcerpt()}}</p>
                        <x-base.link-btn class="self-start mt-4 " href="{{route('post.show', $post->slug)}}">Zobacz</x-base.link-btn>
                    </div>
                </div>

                @endforeach

            </div>

        </header>

        <main id="post-list" class="space-y-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex  items-end gap-3">
                    @if($this->category !== "" || $this->search !== "")
                    <a href="{{route('home')}}" class="hover:scale-110 hover:text-secondary-400 duration-500 "><x-healthicons-o-cleaning class="w-8"/>
                    </a>
                    @endif
                    <h2 class="text-4xl 2xl:text-5xl  font-semibold">Artykuły</h2><span
                        class="text-lg 2xl:text-xl text-gray-400">({{$this->postsCount}})</span>
                    
                </div>

                <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center mr-[10px] md:mr-0">
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

            <div class="grid  md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10">
                @foreach($this->posts as $post)

                
                <div class="group bg-primary-400 rounded-xl  hover:shadow-2xl duration-500 p-0">

                    {{-- THUMBNAIL --}}
                    <div class="overflow-hidden rounded-t-xl">
                        <img src="{{asset($post->getThumbnailUrl())}}"
                            alt="miniaturka artykułu o tytule {{$post->title}}"
                            class="w-full  rounded-t-xl object-cover h-[350px] md:h-[280px] group-hover:scale-110 duration-500">
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-5 pb-8 md:pb-5  flex flex-col gap-8 md:gap-6 ">
                        {{-- title --}}
                        <h2 class="text-2xl md:line-clamp-2 md:h-[70px] font-semibold">
                            {{$post->title}}</h2>
                        <hr class="bg-gray-400 w-3/4 mx-auto group-hover:w-full duration-500">
                        {{-- excerpt --}}
                        <p class="md:text-sm text-gray-400 group-hover:text-fontPrimary duration-500 line-clamp-4">
                            {{$post->getExcerpt()}}</p>
                        {{-- links --}}
                        <div class="flex flex-wrap justify-between items-center ">
                            {{-- links--categories --}}
                            <div class="flex justify-start items-center gap-4 mt-2">
                                @foreach ($post->categories as $category)
                                <a wire:navigate href="{{ route('home', ['category' => $category->slug]) }}"><img
                                        src="{{asset($category->getThumbnailUrl())}}"
                                        alt="miniaturka artykułu o tytule {{$post->title}}"
                                        class="w-7 h-7 rounded-xl object-cover hover:scale-110 duration-500"></a>
                                @endforeach
                            </div>
                            {{-- links--post --}}
                            <a wire:navigate href="{{route('post.show', $game->slug)}}"
                                class="bg-secondary-400 hover:bg-primary-200 duration-500 rounded-full px-6 py-1 ">Czytaj</a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            {{$this->posts->links('vendor.livewire.tailwind')}}
        </main>
    </div>
   

</div>