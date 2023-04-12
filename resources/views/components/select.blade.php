<select
    {{ $attributes->merge(['class' => 'rounded-lg border-0 w-full outline-none p-4 text-xl font-bold']) }}
>
    {{ $slot }}
</select>
