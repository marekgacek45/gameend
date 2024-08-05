@props(['href' => '#'])

<li><a wire:navigate href="{{ $href }}" class="text-xl lg:text-lg font-medium  link-hover">{{ $slot }}</a></li>
