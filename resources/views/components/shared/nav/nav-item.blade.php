@props(['href' => '#',"class" => ''])

<li><a wire:navigate href="{{ $href }}" class="text-xl lg:text-lg font-medium  link-hover {{$class}}">{{ $slot }}</a></li>
