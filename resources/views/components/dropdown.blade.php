<div class="tw-dropdown">
    <div tabindex="0" role="button" class="btn m-1">
        <div tabindex="0" role="button"
            class="tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw-border tw-border-transparent tw-text-sm tw-leading-4 tw-font-medium tw-rounded-md tw-text-green-500 dark:tw-text-green-400 tw-bg-white  hover:tw-text-green-700 focus:tw-outline-none tw-transition tw-ease-in-out tw-duration-150">
            <div>{{ $slot }}</div>

            <div class="tw-ms-1">
                <svg class="tw-fill-current tw-h-4 tw-w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
    <ul tabindex="0" class="tw-dropdown-content tw-menu tw-bg-base-100 tw-rounded-box tw-z-[1] tw-w-52 tw-p-2 tw-shadow">
        <li>
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>
        </li>
        <li>
             <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-link-nav :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-link-nav>
            </form>
        </li>
    </ul>
</div>
