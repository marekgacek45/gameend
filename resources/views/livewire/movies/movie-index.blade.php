<main class="flex py-8 px-2 md:px-8  gap-8 max-w-screen-max mx-auto">
    {{-- FILTERS --}}
    <x-sidebar.aside movie :categories="$this->categories" :completedGames="$this->completedGames"
        :topGames="$this->topGames" />
    {{-- CONTENT --}}
    <div class="w-full xl:w-9/12 space-y-12 ">



        {{-- post list --}}
        <div id="post-list" class="space-y-10">

            {{-- header --}}
            <x-item-list-header title="Filmy" itemCount="{{$this->moviesCount}}" />

            {{-- grid --}}
            <div class="grid  md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10">
                @foreach($this->movies as $movie)
                <x-item-card movie :item="$movie" />
                @endforeach
            </div>

            {{-- pagination --}}
            {{$this->movies->links('vendor.livewire.tailwind')}}
        </div>
    </div>

</main>