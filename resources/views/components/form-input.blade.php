@props(['name', 'type' => 'text'])
<div class="mx-2 p-2">
    <label for="{{ $name }}" class="font-semibold uppercase text-xs">{{ ucwords($name) }}</label><br />
    <input  type="{{ $type }}"
            name="{{ $name }}"
            class="w-full p-2 h-8 rounded border focus:ring focus:outline-none"
            {{ $attributes(['value' => old($name)]) }}/>
</div>
