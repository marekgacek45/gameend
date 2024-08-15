@props(['item','movie' => false])

<article class=" bg-primary-400 rounded-xl  hover:shadow-2xl duration-500 group">

    {{-- THUMBNAIL --}}
    <div class="overflow-hidden rounded-t-xl">
        <img src="{{asset($item->getThumbnailUrl())}}" alt="miniaturka artykułu o tytule {{$item->title}}"
            class="w-full h-[350px] md:h-[280px] object-cover rounded-t-xl   group-hover:scale-110 duration-500">
    </div>
    {{-- CONTENT --}}
    <div class="flex flex-col gap-8 md:gap-6 p-5 pb-8 md:pb-5">
        {{-- title --}}
        <h2 class="md:h-[70px] text-2xl md:line-clamp-2 font-semibold">
            {{$item->title}}</h2>
            @if (!$movie)
            <hr class="w-3/4 mx-auto bg-gray-400  group-hover:w-full duration-500">
            {{-- excerpt --}}
        <p class="md:text-sm text-gray-400  line-clamp-4 group-hover:text-fontPrimary duration-500">
            {{$item->getExcerpt()}}</p>
        @endif
        
        {{-- links --}}
        <div class="flex flex-wrap justify-between items-center ">
            {{-- links--categories --}}
            <div class="flex justify-start items-center gap-4 mt-2">
                @foreach ($item->categories as $category)
                <button type='button' wire:click="setCategory('{{$category->slug}}')"
                    aria-label="wybierz kategorię"><img src="{{asset($category->getThumbnailUrl())}}"
                        alt="miniaturka artykułu o tytule {{$item->title}}"
                        class="w-7 h-7 rounded-xl object-cover hover:scale-110 duration-500"></button>
                @endforeach
            </div>
            {{-- links--post-show --}}
            @if (!$movie)
                
            <x-base.link-btn small href="{{route('blog.show', $item->slug)}}">Czytaj</x-base.link-btn>
            @else
            <x-base.link-btn notNavigated={{false}} small href="{{$item->link}}" target="_blank" rel="norefferer nofollow">Zobacz</x-base.link-btn>

            @endif
        </div>
    </div>

</article>