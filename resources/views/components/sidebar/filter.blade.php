@props(['item', 'href', 'filter'])

<li {{$attributes}} wire:key="{{$filter . '-'.$item->id}}"
    class="flex justify-between items-center  py-2 px-2 rounded-xl hover:bg-primary-200 duration-500  cursor-pointer {{ $item->slug === $this->$filter ? ' bg-secondary-400' : '' }}">

    <div class="flex justify-center items-center gap-4">
        <img src="{{ asset($item->getThumbnailUrl()) }}" alt="logo kategorii {{$item->title}}"
            class="w-9 h-9 rounded-xl object-cover">
        <h3 class="line-clamp-1">{{ $item->title }}</h3>
    </div>

    <span class="font-semibold">{{ $this->getPostCountByCategory($item->slug) }}</span>


</li>