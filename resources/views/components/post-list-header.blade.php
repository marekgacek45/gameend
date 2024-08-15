<header class="flex flex-col md:flex-row justify-between items-center">
    {{-- title && clear btn --}}
    <div class="flex  items-end gap-3">
        @if($this->category !== "" || $this->search !== "")
        <button wire:click='clear' class="hover:scale-110 hover:text-secondary-400 duration-500 ">
            <x-healthicons-o-cleaning class="w-8" />
        </button>
        @endif
        <h2 class="text-4xl 2xl:text-5xl  font-semibold">Artykuły</h2><span
            class="text-lg 2xl:text-xl text-gray-400">({{$this->postsCount}})</span>

    </div>
    {{-- search box --}}
    <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center mr-[10px] md:mr-0">
        <div class="flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            <input wire:model.live.debounce.1000ms="search" type="text" placeholder="Szukaj..."
                class=" ml-2 rounded-full border-2 border-secondary-400 px-4 py-2 hover:bg-gray-100 text-primary-400 " />
        </div>

    </div>
</header>