@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-100 form-control tw-border-gray-300 dark:tw-border-gray-700 tw-dark:bg-gray-900 tw-dark:text-gray-300 tw-focus:tw-border-indigo-500 tw-dark:focus:tw-border-indigo-600 tw-focus:tw-ring-indigo-500 tw-dark:focus:tw-ring-indigo-600 tw-rounded-md tw-w-100 tw-shadow-sm']) !!}>
