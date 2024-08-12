@props(['item', 'href', 'key'])

<li wire:key="{{$key}}">
    <a wire:navigate href="{{$href}}" class="flex justify-between items-center border-b border-primary-600 last-of-type:border-none hover:bg-primary-200 duration-500 rounded-xl py-2 px-2">

        <div class="flex justify-center  items-center gap-4">
            <img src="{{asset($item->getThumbnailUrl())}}" alt="logo kategorii {{$item->title}}" class="w-9 h-9 rounded-xl object-cover">
            <h3 >
                
                {{ $item->title }}
            </h3>
        </div>
        <span class="font-semibold">{{$item->posts->count()}}</span>
    </a>
    </li>