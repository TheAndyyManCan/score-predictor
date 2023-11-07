@props(['users'])
<x-layout>
    <h1 class="text-4xl font-bold text-center p-4 mt-2">League title</h1>
    <div class="py-8 rounded-xl bg-gray-200">
        <div class="p-4 rounded-xl border border-black mx-auto">
            <table class="w-full">
                <tr>
                    <th class="uppercase text-sm font-semibold">Username</th>
                    <th class="uppercase text-sm font-semibold">Points</th>
                </tr>
            </table>
        </div>
    </div>
</x-layout>
