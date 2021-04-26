@extends('layouts.app')
@section('content')
    <form class='column is-12' action="{{ route('book.index') }}" method="get">
        <div class="is-flex has-addons field">
            @component('layouts.filterSort', compact('authors', 'books', 'filterBy', 'sortBy'))
            @endcomponent
        </div>
    </form>
    @if (session()->has('success_message'))
        @component('layouts.notification', ['message' => true])
        @endcomponent
    @elseif ($errors->any())
        @component('layouts.notification', ['message' => false])
        @endcomponent
    @endif
    @if ($books->count() === 0)
        <div class='is-5 column has-text-centered box'>
            <p class='my-6 title is-5'>No books in the list</p>
            <a href="{{ route('book.create') }}" class='button is-primary is-normal'>Add a new book?</a>
        </div>
    @else
        @component('layouts.cards', compact('authors', 'booksFiltered'))

        @endcomponent
        <div class="column is-12">
            {{ $booksFiltered->links() }}
        </div>
    @endif
@endsection
