<nav
    class="flex justify-between items-center  max-w-screen-max mx-auto px-6 xs:px-12 sm:px-16 py-4 bg-primary-400 rounded-var shadow-2xl">
    <div class="flex items-center gap-16">

        <x-shared.nav.logo-link />

        <x-shared.nav.nav-list class="hidden lg:flex items-center gap-8" />

    </div>


    @if (auth()->check())
        <div class="hidden lg:block">

            <x-base.link-btn href="/admin">admin</x-base.link-btn>
        </div>
    @else
        <x-shared.nav.social-list class="hidden lg:flex" />
    @endif


    <x-shared.nav.hamburger />
    <x-shared.nav.mobile-menu />
</nav>
