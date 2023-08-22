@props(['team1', 'team2', 'fixtureId'])
<div class="mt-4 bg-gray-200 rounded-xl h-24 py-2">
    <div class="grid grid-cols-3 place-items-center w-full lg:w-1/2 mx-auto py-6">
        <div class="flex">
            <img class="h-10 w-10 mr-2" src="{{ $team1['image_path'] }}" />
            <x-predictor-label>{{ $team1['name'] }}</x-predictor-label>
        </div>
        <div>
            <input type="hidden" name="fixtures[{{ $fixtureId }}][sportsmonk_id]" value="{{ $fixtureId }}" />
            <x-predictor-input name="fixtures[{{ $fixtureId }}][home_prediction]"/>
            -
            <x-predictor-input name="fixtures[{{ $fixtureId }}][away_prediction]" />
        </div>
        <div class="flex">
            <x-predictor-label>{{ $team2['name'] }}</x-predictor-label>
            <img class="h-10 w-10 ml-2" src="{{ $team2['image_path'] }}"
        </div>
    </div>
</div>
