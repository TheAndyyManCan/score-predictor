<x-layout>
    <x-account.layout header="Account">
        <form class="p-4 max-w-lg mx-auto" method="POST" action="/account">
            @csrf
            <x-form-input name="name" value="{{ auth()->user()->name }}" required />
            <x-form-input name="email" value="{{ auth()->user()->email }}" required />
            <x-submit-button class="mt-2 ml-4">Edit Account</x-submit-button>
        </form>
    </x-account.layout>
</x-layout>
