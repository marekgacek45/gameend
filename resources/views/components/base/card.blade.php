@props(['title','class'=>''])

<div class="bg-primary-400 rounded-xl p-4 hover:shadow-2xl duration-500 {{$class}}" >
  
  {{$slot}}
</div>