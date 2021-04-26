@extends('layouts.app')
@section('content')
    <div class="column is-three-quarters-desktop pricing-table mx-auto">
        <div class="box pricing-plan" data-author-list>
            <div class="plan-header has-icons">
                <i class="fas fa-user"></i>
                Author list
            </div>
            <form action="{{ route('author.store') }}" method="post">
                <div class="field is-flex-tablet is-flex-direction-row">
                    <div class="control m-1">
                        <input class="input is-small" type="text" name="author_name" placeholder="Author name"
                            value="{{ old('author_name') }}">
                    </div>
                    <div class="control m-1">
                        <input class="input is-small" type="text" name="author_surname" placeholder="Author surname"
                            value="{{ old('author_surname') }}">
                    </div>
                    <div class="control m-1">
                        <button class="is-small mx-1-tablet button is-primary is-fullwidth">
                            Add author
                        </button>
                    </div>
                </div>
                @csrf
            </form>
            <form action="{{ route('author.index') }}" method='get'
                class='field has-addons is-flex-tablet is-flex-direction-row is-flex-wrap-wrap'>
                <div class="control">
                    <div class="select is-small">
                        @if ($authors->count() != 0)
                            <select name='sort'>
                                <option disabled selected>Sort by:</option>
                                <optgroup label="Ascending">
                                    <option @if ($sortBy == 'name_asc') selected @endif value='name_asc'>Author name</option>
                                    <option @if ($sortBy == 'surname_asc') selected @endif value='surname_asc'>Author surname</option>
                                    <option @if ($sortBy == 'books_asc') selected @endif value='books_asc'>Books written</option>
                                <optgroup label="Descending">
                                    <option @if ($sortBy == 'name_desc') selected @endif value='name_desc'>Author name</option>
                                    <option @if ($sortBy == 'surname_desc') selected @endif value='surname_desc'>Author surname</option>
                                    <option @if ($sortBy == 'books_desc') selected @endif value='books_desc '>Books written</option>
                            </select>
                        @else
                            <select disabled name='sort'>
                                <option>Sort by:</option>
                            </select>
                        @endif
                    </div>
                </div>
                <div class="control">
                    <button type="submit" class="is-small button is-primary" @if ($authors->count() == 0) disabled @endif>Sort</button>
                </div>
                <div class="control">
                    <a @if ($authors->count() != 0) href="{{ route('author.index') }}" @else disabled @endif
                        class="is-small button is-outlined is-danger">Clear sorting</a>
                </div>

            </form>
            @if (session()->has('success_message'))
                @component('layouts.notification', ['message' => true])
                @endcomponent
            @elseif ($errors->any())
                @component('layouts.notification', ['message' => false])
                @endcomponent
            @endif
            @if ($authors->count() === 0)
                <div class='box'>No authors in the list available</div>
            @else
                <table class="table is-hoverable is-fullwidth has-text-centered is-narrow">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Author name</th>
                            <th>Author surname</th>
                            <th>Total books</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr class='author-row'>
                                <td>{{ $author->id }}</td>
                                <td class='author-quickshow' data-show="quickview" data-target="quickviewDefault"
                                    data-url={{ route('author.show', $author) }}>{{ $author->name }}</td>
                                <td>{{ $author->surname }}</td>
                                <td>
                                    <div class="tag is-medium 
                                        @if ($author->getBooks->count() > 0) is-success
                                    @else is-danger @endif">
                                        Books {{ $author->getBooks->count() }}
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('author.delete', $author) }}" method='post'>
                                        <a href={{ route('author.edit', $author) }}
                                            class="button is-small is-info my-1 is-touch btn-tbl">Edit author</a>
                                        <button
                                            class="button is-small is-danger my-1 is-touch is-outlined btn-tbl">Delete</button>
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $authors->links() }}
            @endif
        </div>
    @endsection
