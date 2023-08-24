@props(['header'])
<h1 class="text-4xl font-bold text-center p-4 mt-2">{{ ucwords($header) }}</h1>
<div class="flex my-8 mx-8 sm:mx-36 h-fit">
    <div class="mr-4 w-2/5 text-center py-8 rounded-xl bg-gray-200">
        <ul class="font-semibold">
            <x-account.list-item link="/account" text="Account" route="account" />
            <x-account.list-item link="/account/predictions" text="predictions" route="account/predictions" />
        </ul>
    </div>
    <div class="w-full bg-gray-200 rounded-xl p-6">
        {{ $slot }}
    </div>
</div>
