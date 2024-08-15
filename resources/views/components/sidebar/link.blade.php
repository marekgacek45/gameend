@props(['item', 'href', 'movie' => false])

<li wire:key="{{$item->title . '-'.$item->id}}">
    <a {{!$movie ? "wire:navigate" : ""}} href="{{$href}}" {{$attributes}}
        class="flex justify-between items-center py-2 px-2 rounded-xl hover:bg-primary-200 duration-500  ">
        <div class="flex justify-center items-center gap-4">
            <img src="{{ asset($item->getThumbnailUrl()) }}" alt="logo kategorii {{$item->title}}"
                class="w-9 h-9 rounded-xl object-cover">
            <h3 class="line-clamp-1">{{ $item->title }}</h3>
        </div>
    
    </a>
</li>