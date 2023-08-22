@props(['link', 'text'])
<li class="w-full hover:bg-black hover:text-white py-2">
    <a href="{{ $link }}">{{ ucwords($text) }}</a>
</li>
