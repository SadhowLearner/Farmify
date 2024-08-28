@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label w-100 tw-font-medium tw-text-sm']) }}>
    {{ $value ?? $slot }}
</label>
