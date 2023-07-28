<x-layout>
    <div class="p-8 text-center">
        <h2 class="font-semibold text-xl uppercase">Login</h2>
    </div>
    <x-grey-panel class="mx-auto w-96">
        <form class="p-4">
            <x-form-input name="username" />
            <x-form-input name="password" type="password" />
            <x-submit-button class="mt-2 ml-4">Login</x-submit-button>
        </form>
    </x-grey-panel>
</x-layout>
