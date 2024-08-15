@props(['direction','indicator'])

@if ($direction === 'left')
    <button class=" {{ $indicator }}"><x-iconpark-arrowcircleleft-o
            class="w-12 text-dark-800 dark:text-light-200  hover:text-dark-200 dark:hover:text-light-600 duration-500" />

    </button>
@elseif ($direction === 'right')
    <button class="{{ $indicator }}"><x-iconpark-arrowcircleright-o
            class="w-12 text-dark-800 dark:text-light-200  hover:text-dark-200 dark:hover:text-light-600  duration-500" />

    </button>
@endif