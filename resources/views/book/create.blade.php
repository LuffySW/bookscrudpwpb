@extends('layouts.app')
@section('content')
    <div class="column is-7-desktop pricing-table mx-auto">
        <div class="box pricing-plan">
            <div class="plan-header has-text-left">New book:</span></div>
            <form action="{{ route('book.store') }}" method='post'>
                <div class="column">
                    <div class="field">
                        <label class='label'>Title</label>
                        <div class="control has-icons-right">
                            <input class="input @error('book_title')is-danger @enderror" type="text" name="book_title" placeholder="Name"
                                value={{ old('book_title') }}>
                            @error('book_title')
                                <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                            @enderror
                        </div>
                        @error('book_title')<p class="help is-danger">{{ $errors->first('book_title') }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class='label'>ISBN</label>
                        <div class="control has-icons-right">
                            <input class="input @error('book_isbn')is-danger @enderror" type="text" name="book_isbn" placeholder="ISBN"
                                value={{ old('book_isbn') }}>
                            @error('book_isbn')
                                <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                            @enderror
                        </div>
                        @error('book_isbn')
                        <p class="help is-danger">{{ $errors->first('book_isbn') }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class='label'>Pages</label>
                        <div class="control has-icons-right">
                            <input class="input @error('book_pages')is-danger @enderror" type="text" name="book_pages" placeholder="Pages"
                                value={{ old('book_pages') }}>
                            @error('book_pages')
                                <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                            @enderror
                        </div>
                        @error('book_pages')
                        <p class="help is-danger">{{ $errors->first('book_pages') }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Author</label>
                        <div class="control">
                            <div class="select @error('author_id')is-danger @enderror">
                                @if ($authors->count() != 0)
                                    <select name='author_id'>
                                        <option value='0' selected disabled>Select author</option>
                                        @foreach ($authors as $author)
                                            <option @if (old('author_id') == $author->id) selected @endif value="{{ $author->id }}">
                                                {{ $author->name }} {{ $author->surname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('author_id')<p class="help is-danger">{{ $errors->first('author_id') }}
                                        </p>
                                    @enderror
                                @else
                                    <select disabled>
                                        <option>{{ 'No authors in the list' }}</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="field my-5">
                        <label class="label">Book description</label>
                        <div class="control summer-text">
                            <textarea maxlength='500' class="textarea" id="summernote"
                                name='book_description'>{{ old('book_description') }}</textarea>
                            <span id="total-chars"></span>
                            @error('book_description')<p class="help is-danger">
                                    {{ $errors->first('book_description') }}</p>
                            @enderror
                        </div>
                    </div>
                <div class="buttons control mt-5 mb-3 is-flex is-justify-content-flex-end">
                    <button type='submit' class="button mob-btn is-primary mr-2">Add book</button>
                    <a href="{{ route('book.index') }}" class="button is-danger mr-2 is-outlined mob-btn">Back</a>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
