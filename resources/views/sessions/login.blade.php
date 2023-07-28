<x-layout>
    <div class="p-8 text-center">
        <h2 class="font-semibold text-xl uppercase">Login</h2>
    </div>
    <x-grey-panel class="mx-auto max-w-lg">
        <form class="p-4 max-w-lg" method="POST" action="/sessions">
            @csrf
            <x-form-input name="email" type="email" required />
            <x-form-input name="password" type="password" required />
            <x-submit-button class="mt-2 ml-4">Login</x-submit-button>
        </form>
    </x-grey-panel>
</x-layout>
