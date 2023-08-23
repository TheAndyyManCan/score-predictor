@props(['link', 'text', 'route'])
<li class="w-full hover:bg-black hover:text-white mb-2">
    <a href="{{ $link }}" class="{{ request()->is($route) ? 'bg-black text-white' : '' }} block w-full py-2">{{ ucwords($text) }}</a>
</li>
