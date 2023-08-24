<x-layout>
    <x-account.layout header="Predictions">
        @foreach($predictions as $prediction)
        <div class="rounded-xl w-full h-24 mb-4 bg-gray-200 border border-black">
            <div class="grid grid-cols-3 place-items-center w-full mx-auto py-6">
                <div class="flex">
                    <img class="h-10 w-10 mr-2" src="{{ $teams[$prediction->fixture_id]['home_team']['data']['image_path'] }}" />
                    <x-predictor-label>{{ $teams[$prediction->fixture_id]['home_team']['data']['name'] }}</x-predictor-label>
                </div>
                <div class="grid grid-cols-3 place-items-center font-semibold">
                    <div>
                        {{ $prediction->home_prediction }}
                    </div>
                    <div>
                        -
                    </div>
                    <div>
                        {{ $prediction->away_prediction }}
                    </div>
                </div>
                <div class="flex">
                    <x-predictor-label>{{ $teams[$prediction->fixture_id]['away_team']['data']['name'] }}</x-predictor-label>
                    <img class="h-10 w-10 ml-2" src="{{ $teams[$prediction->fixture_id]['away_team']['data']['image_path'] }}" />
                </div>
            </div>
        </div>
        @endforeach
    </x-account.layout>
</x-layout>
