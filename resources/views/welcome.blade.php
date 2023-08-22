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
    @endif
</x-layout>
