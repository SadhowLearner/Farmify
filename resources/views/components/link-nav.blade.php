@php
$classes = ($active ?? false)
            ? 'tw-inline-flex tw-tooltip tw-tooltip-right tw-items-center tw-mx-auto tw-mb-3 tw-px-5 tw-no-underline hover:tw-scale-95  tw-py-3 tw-text-white focus:tw-text-slate-50  tw-border-b-2 tw-bg-success tw-text-l hover:tw-text-white tw-rounded-full  tw-font-medium tw-leading-5 focus:tw-outline-none tw-transition tw-duration-150 tw-ease-in-out'
            : 'tw-inline-flex tw-tooltip tw-tooltip-right tw-items-center tw-mx-auto tw-mb-3 tw-px-5 tw-no-underline hover:tw-scale-95  tw-py-3 tw-text-success focus:tw-text-slate-50  tw-border-b-2 tw-text-l hover:tw-text-white tw-rounded-full  tw-font-medium tw-leading-5 hover:tw-text-slate-100 hover:tw-bg-success focus:tw-outline-none focus:tw-text-white focus:tw-bg-success  tw-transition tw-duration-150 tw-ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes])}}>
    {{ $slot }}
</a>