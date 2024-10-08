<main class="flex py-8 px-2 md:px-8  gap-8 max-w-screen-max mx-auto">
    {{-- FILTERS --}}
    <x-sidebar.aside :categories="$this->categories" :completedGames="$this->completedGames"
        :topGames="$this->topGames" />
    {{-- CONTENT --}}
    <div class="w-full xl:w-9/12 space-y-12 ">

        {{-- featured post --}}
        <x-main-header :featuredPosts="$this->featuredPosts" />

        {{-- post list --}}
        <div id="post-list" class="space-y-10">

            {{-- header --}}
            <x-item-list-header title="Artykuły" itemCount="{{$this->postsCount}}"/>

            {{-- grid --}}
            <div class="grid  md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10">
                @foreach($this->posts as $post)
                <x-item-card :item="$post" />
                @endforeach
            </div>

              {{-- pagination --}}
            {{$this->posts->links('vendor.livewire.tailwind')}}
        </div>
    </div>

</main>