@props(['item', 'href', 'filter','postCount' => false])

<li wire:key="{{$filter . '-'.$item->id}}">
    <a wire:navigate href="{{$href}}" class="flex justify-between items-center  hover:bg-primary-200 duration-500 rounded-xl py-2 px-2 {{ $item->slug === $this->$filter ? ' bg-secondary-400' : '' }}">

        <div class="flex justify-center  items-center gap-4">
            <img src="{{asset($item->getThumbnailUrl())}}" alt="logo kategorii {{$item->title}}" class="w-9 h-9 rounded-xl object-cover">
            <h3 class="line-clamp-1">
                
                {{ $item->title }}
            </h3>
        </div>
        @if ($postCount)
            
        <span class="font-semibold">{{$item->posts->count()}}</span>
        @endif
    </a>
    </li>