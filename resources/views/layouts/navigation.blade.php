    <div x-data="{ isOpen: false }" class="tw-flex tw-h-screen">
        <!-- Sidebar -->
        <div class="tw-bg-slate-50 sm:tw-sticky sm:tw-start-0 tw-text-white tw-w-[10vw] tw-space-y-6 tw-py-7 tw-px-2 tw-inset-y-0 tw-left-0 tw-transform -tw-translate-x-full md:tw-relative md:tw-translate-x-0 tw-transition-transform tw-duration-200 tw-ease-in-out"
            :class="{ '-tw-translate-x-full': !isOpen, 'tw-translate-x-0': isOpen }">
            <!-- Logo -->
            <div class="tw-flex tw-flex-row ">
                <a href="{{ route('dashboard') }}"
                    class="tw-bg-white tw-pt-2 tw-rounded-full  tw-flex tw-items-center tw-px-4">
                    <x-application-logo class="" />
                </a>
                <button @click="isOpen = !isOpen"
                    class="tw-absolute tw-top-0 tw-right-0 tw-m-3 tw-text-white-900 focus:tw-outline-none md:tw-hidden">
                    <div class="bi bi-x tw-w-6 tw-text-black"></div>
                </button>
            </div>
            <!-- Navigation -->
                <form method="POST" action="{{ route('logout') }}" class="tw-inline-flex tw-flex-col tw-container">
                    <x-link-nav :href="route('dashboard')" :active="request()->routeIs('dashboard')" :tooltip="'Dashboard'">
                        <i class="bi bi-house"></i>
                    </x-link-nav>
                    <x-link-nav :href="route('dashboard')" :active="request()->routeIs('search')" :tooltip="'Cari'">
                        <i class="bi bi-search"></i>
                    </x-link-nav>
                    <x-link-nav :href="route('dashboard')" :active="request()->routeIs('setting')" :tooltip="'Pengaturan'">
                        <i class="bi bi-gear"></i>
                    </x-link-nav>
                    <x-link-nav :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" :tooltip="'Profile'">
                        <i class="bi bi-person"></i>
                    </x-link-nav>
                    @csrf
                    <x-link-nav :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();" :tooltip="'Log Out'">
                        <i class="bi bi-power"></i>
                    </x-link-nav>
                    <div class="tw-flex tw-items-center tw-ms-4">
                        <x-dropdown width="48">
                            {{ Auth::user()->name }}< </x-dropdown>
                    </div>
                </form>
        </div>

        <!-- Content area -->
        <div class="tw-flex-1 tw-flex tw-flex-col">
            <!-- Header Page  -->
            <header class="tw-bg-white tw-shadow-md tw-w-full">
                <div class="tw-flex tw-justify-between tw-items-center tw-px-4 tw-py-3">
                    <button @click="isOpen = !isOpen" class="tw-text-slate-950 focus:tw-outline-none md:tw-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <h1 class="tw-text-2xl tw-font-semibold tw-text-black tw-capitalize ">
                        {{ Str::replace('.', ' ', Route::currentRouteName()) }}</h1>
                </div>
            </header>
            <!-- Main content -->
            <main class="tw-flex-1 tw-p-6 tw-max-h-screen  tw-overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>




    <!-- Primary Navigation Menu -->
