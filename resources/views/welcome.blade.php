<x-layout>
    @if(count($fixtures))
        <form class="sm:mx-36 mx-8">
            @foreach($fixtures as $fixture)
                <x-predictor-fixture :team1="$fixture[0]" :team2="$fixture[1]" />
            @endforeach
            <div class="mt-4 absolute sm:right-36 right-8">
                <x-submit-button>Submit</x-submit-button>
            </div>
        </form>
    @endif
</x-layout>
