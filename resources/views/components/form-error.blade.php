@props(['name'])

@error($name)
    <span class="text-xs text-red">{{ $message }}</span>
@enderror
