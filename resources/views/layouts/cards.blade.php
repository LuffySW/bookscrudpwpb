@foreach ($booksFiltered as $book)
    <div class="pricing-table column is-4">
        <div class="box pricing-plan">
            <div class="plan-header">
                <span>Book: </span>
                <span>{{ $book->title ?? '' }} </span>
            </div>
            <div class="plan-items">
                <div class="plan-item"><span class='has-text-weight-bold'>Book author:</span>
                    <p>{{ $book->getAuthor->name ?? '' }} {{ $book->getAuthor->surname ?? '' }}</p>
                </div>
            </div>
            <div class="plan-items">
                <div class="plan-item"><span class='has-text-weight-bold'>ISBN:</span>
                    <p>{{ $book->isbn ?? ''}}</p>
                </div>
            </div>
            <div class="plan-items">
                <div class="plan-item"><span class='has-text-weight-bold'>Pages:</span>
                    <p>{{ $book->pages ?? '' }}</p>
                </div>
            </div>
            <div class="plan-items">
                <div class="plan-item"><span class='has-text-weight-bold'>Description:</span>
                    <p>{!! $book->short_description ?? 'No description' !!}</p>
                </div>
            </div>
            <div class='plan-footer'>
                <a href={{ route('book.edit', $book) }} id="editoutfit"
                    class="button is-fullwidth is-primary my-3">Edit book</a>
                <form class='delete-outfit' data-outfit-name="{{ $book->name }}" data-outfit-id="{{ $book->id }}"
                    action="{{ route('book.delete', $book) }}" method='post'>
                    <button class="button is-danger is-fullwidth my-3 is-outlined">Delete
                        book</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endforeach
