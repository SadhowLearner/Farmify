<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-bg-green-600 tw-border tw-border-transparent tw-rounded-md tw-font-semibold tw-text-xs tw-text-white tw-uppercase tw-tracking-widest hover:tw-bg-green-700 focus:tw-bg-gray-700 dark:focus:tw-bg-white active:tw-bg-gray-900 dark:active:tw-bg-gray-300 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-indigo-500 focus:tw-ring-offset-2 dark:focus:tw-ring-offset-gray-800 tw-transition tw-ease-in-out tw-duration-150']) }}>
    {{ $slot }}
</button>