{{-- FILTERING AND SORTING --}}
<div class="control">
    <div class="select">
        @if ($horses->count() != 0)
            <select name='filter_by'>
                <option value='0' disabled @if ($filterBy == '0') selected @endif>Filter by:</option>
                <optgroup label="Horse name">
                    @foreach ($horses as $horse)
                        <option value="{{ $horse->id }}" @if ($filterBy == $horse->id) selected @endif>
                            {{ $horse->name }} #{{ $horse->id }}
                        </option>
                    @endforeach
            </select>
        @else
            <select disabled name='sort'>
                <option>No masters</option>
            </select>
        @endif
    </div>
</div>
<div class="control">
    <div class="select">
        @if ($betters->count() != 0)
            <select name='sort'>
                <option disabled selected>Sort by:</option>
                <optgroup label="Ascending">
                    <option @if ($sortBy == 'name_asc') selected @endif value='name_asc'>Better name</option>
                    <option @if ($sortBy == 'bet_asc') selected @endif value='bet_asc'>Bet size</option>
                <optgroup label="Descending">
                    <option @if ($sortBy == 'name_desc') selected @endif value='name_desc'>Better name</option>
                    <option @if ($sortBy == 'bet_desc') selected @endif value='bet_desc'>Bet size</option>
            </select>
        @endif
    </div>
</div>
<div class="control">
    <button type="submit" class="button is-primary">Select</button>
</div>
<div class="control">
    <a href="{{ route('better.index') }}" class="button is-outlined is-danger">Clear filter</a>
</div>
{{-- FILTERING ENDS --}}
