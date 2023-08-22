<x-layout>
    {{-- @dd($fixtures) --}}
    @if(count($fixtures))
        <form class="sm:mx-36 mx-8" method="POST" action="/predictions">
            @csrf
            @foreach($fixtures as $fixture)
                <x-predictor-fixture :team1="$fixture['participants'][0]" :team2="$fixture['participants'][1]" :fixtureId="$fixture['id']" />
            @endforeach
            <div class="py-4">
                <x-submit-button>Submit</x-submit-button>
            </div>
        </form>
    @else
        <div class="max-w-full sm:mx-36 mx-8 mt-8 bg-gray-200 rounded-xl p-6 text-center font-semibold">
            No predictions left to submit for this gameweek. Good luck!
        </div>
    @endif
</x-layout>
