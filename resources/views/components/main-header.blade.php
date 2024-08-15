@props(['featuredPosts'])

<header class="swiper featured-posts-slider h-[75vh]  sm:h-[55vh]  rounded-xl group">
    <div class="swiper-wrapper">
        @foreach ($featuredPosts as $post)

        <div class="swiper-slide  p-12 bg-center bg-no-repeat bg-cover bg-blend-multiply bg-gray-500  "
            style="background-image: url({{$post->getThumbnailUrl()}})">

            <div class="w-5/5 md:w-4/5 2xl:w-3/5 h-full flex flex-col justify-end items-start gap-6">
                <h1 class="text-3xl sm:text-4xl 2xl:text-5xl font-semibold">

                    {{$post->title}}
                </h1>
                <p class="text-lg line-clamp-4 2xl:line-clamp-none">{{$post->getExcerpt()}}</p>
                <x-base.link-btn class="self-start mt-4 " href="{{route('post.show', $post->slug)}}">Zobacz
                </x-base.link-btn>
            </div>
        </div>

        @endforeach

    </div>

</header>