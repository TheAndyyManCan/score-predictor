@props(['name'])

@error($name)
    <span class="text-xs text-red-800 uppercase font-semibold">{{ $message }}</span>
@enderror
