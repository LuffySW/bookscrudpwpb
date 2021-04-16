@foreach ($booksFiltered as $book)
    <div class="pricing-table column is-4">
        <div class="box pricing-plan">
            <div class="plan-header">
                <span>Book: </span>
                <span>{{ $book->name ?? '' }} {{ $book->surname ?? '' }}</span>
            </div>
            <div class="plan-items">
                <div class="plan-item"><span class='has-text-weight-bold'>Bet size:</span>
                    <p>{{ $book->bet ?? '' }} &euro;</p>
                </div>
                <div class="plan-item"><span class='has-text-weight-bold'>Horse bet on:</span>
                    <p>{{ $book->getHorse->name ?? '' }}</p>
                </div>
                <div class="plan-item">
                    <span class='has-text-weight-bold'>Horse runs:</span>
                    <p>{{ $book->getHorse->runs }}</p>
                </div>
                <div class="plan-item">
                    <span class='has-text-weight-bold'>Horse wins:</span>
                    <p>{{ $book->getHorse->wins }}</p>
                </div>
            </div>
            <div class='plan-footer'>
                <a href={{ route('book.edit', $book) }} id="editoutfit"
                    class="button is-fullwidth is-primary my-3">Edit bet</a>
                <form class='delete-outfit' data-outfit-name="{{ $book->name }}" data-outfit-id="{{ $book->id }}"
                    action="{{ route('book.delete', $book) }}" method='post'>
                    <button class="button is-danger is-fullwidth my-3 is-outlined">Delete
                        Bet</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endforeach
