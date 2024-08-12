@props(['href' => '#'])

<a wire:navigate href={{$href}}
    class=" px-9 py-2.5 bg-primary-200 hover:bg-secondary-400 rounded-full  shadow-2xl duration-500"
    {{ $attributes }}>admin</a>
