@props(['team1', 'team2'])
<div class="mt-4 bg-gray-200 rounded-xl h-24 py-2">
    <div class="grid grid-cols-3 place-items-center w-full lg:w-1/2 mx-auto py-6">
        <div>
            <x-predictor-label>{{ $team1 }}</x-predictor-label>
        </div>
        <div>
            <x-predictor-input name="{{ $team1 }}"/>
            -
            <x-predictor-input name="{{ $team2 }}" />
        </div>
        <div>
            <x-predictor-label>{{ $team2 }}</x-predictor-label>
        </div>
    </div>
</div>
