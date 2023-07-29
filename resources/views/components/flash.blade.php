@if(session()->has('success'))
    <div x-data="{ show:true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
        class="transition fixed bottom-20 right-3 bg-black text-white text-sm py-2 px-4 rounded-xl ease-in-out duration-300">
        <p>{{ session('success') }}</p>
    </div>
@endif
