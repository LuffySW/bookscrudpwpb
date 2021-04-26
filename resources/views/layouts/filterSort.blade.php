{{-- FILTERING AND SORTING --}}
<div class="control">
    <div class="select">
        @if ($authors->count() != 0)
            <select name='filter_by'>
                <option value='0' disabled @if ($filterBy == '0') selected @endif>Filter by:</option>
                <optgroup label="Author">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" @if ($filterBy == $author->id) selected @endif>
                            {{ $author->name }} {{ $author->surname }}
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
        @if ($books->count() != 0)
            <select name='sort'>
                <option disabled selected>Sort by:</option>
                <optgroup label="Ascending">
                    <option @if ($sortBy == 'title_asc') selected @endif value='title_asc'>Book title</option>
                    <option @if ($sortBy == 'pages_asc') selected @endif value='pages_asc'>Book pages</option>
                <optgroup label="Descending">
                    <option @if ($sortBy == 'title_desc') selected @endif value='title_desc'>Book title</option>
                    <option @if ($sortBy == 'pages_desc') selected @endif value='pages_desc'>Book pages</option>
            </select>
        @endif
    </div>
</div>
<div class="control">
    <button type="submit" class="button is-primary">Select</button>
</div>
<div class="control">
    <a href="{{ route('book.index') }}" class="button is-outlined is-danger">Clear filter</a>
</div>
{{-- FILTERING ENDS --}}
