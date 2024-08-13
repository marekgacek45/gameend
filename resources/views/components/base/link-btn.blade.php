@props(['href' => '#','class' => ''])

<a wire:navigate href={{$href}}
    class=" px-9 py-2.5 bg-secondary-400 hover:bg-primary-200  rounded-full  shadow-2xl duration-500 {{$class}}" {{
    $attributes }}>{{$slot}}</a>