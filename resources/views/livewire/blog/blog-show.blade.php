<main class=" py-8 px-2 md:px-8 space-y-24 max-w-screen-max mx-auto">
<article class="space-y-16">
    <header class="max-w-screen-2xl mx-auto flex flex-col  justify-center items-center gap-12">
        <div class="overflow-hidden w-full rounded-xl">

            <img src="{{ $this->post->getThumbnailUrl() }}" alt="miniaturka postu o tytule {{$post->title}}" class="w-full object-cover max-h-[500px] 2xl:max-h-[600px] hover:scale-110 duration-500">
        </div>
        <h1 class="text-4xl sm:text-6xl max-w-screen-lg text-center">{{ $post->title }}</h1>
        <div class="flex justify-between items-center w-full max-w-screen-lg">
            <div class="flex flex-col justify-start items-start gap-2">
                <span class="text-base font-medium">Publikacja:</span>
                <span class="text-sm"> {{ $post->getPublishedDate() }}</span>
            </div>
            <div class="flex justify-start items-center gap-4 mt-2">
                @foreach ($post->categories as $category)
                <a wire:navigate type='button' href="{{ route('blog.index', ['category' => $category->slug]) }}" aria-label="wybierz kategorię"><img
                        src="{{asset($category->getThumbnailUrl())}}"
                        alt="miniaturka artykułu o tytule {{$post->title}}"
                        class="w-7 h-7 rounded-xl object-cover hover:scale-110 duration-500"></a>
                @endforeach
            </div>
        </div>
    </header>
    




    <div class=" mx-auto prose text-fontPrimary text-lg max-w-screen-lg" style="line-height:1.6">
        {!! $post->content !!}
    </div>

    @if (count($post->gallery) >= 4)


    <div class="swiper post-gallery-swiper">
        <div class="  swiper-wrapper">

            @foreach ($post->gallery as $img)
            {{-- <img src="{{ asset('storage/' . $img) }}" alt="" class="w-20 swiper-slide"> --}}
            <a data-fslightbox href="{{ asset('storage/' . $img) }}" class=" swiper-slide">
                <img src="{{ asset('storage/' . $img) }}" alt="zdjęcie przedstawiające {{ $post->title }}"
                    class=" h-full w-full  aspect-square max-w-[500px] object-cover rounded-xl">
            </a>


            @endforeach
        </div>

        {{-- nav --}}
        <nav class="absolute right-8 bottom-4 flex justify-center items-center gap-2 z-50">
            <x-base.navigate-button direction="left" indicator="post-gallery-prev" />
            <x-base.navigate-button direction="right" indicator="post-gallery-next" />
        </nav>
    </div>

    @endif

</article>


<div class="max-w-screen-xl mx-auto space-y-12 border-t border-secondary-200 pt-20">
<h2 class="text-4xl 2xl:text-5xl  font-semibold text-center ">Najnowsze artykuły</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        @foreach ($latestPosts as $post)
        <x-item-card :item="$post" />
        @endforeach
    </div>
</div>

</main>