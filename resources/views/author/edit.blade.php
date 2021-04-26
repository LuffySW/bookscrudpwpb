@extends('layouts.app')
@section('content')
    <div class="column is-7-desktop pricing-table mx-auto">
        <div class="box pricing-plan">
            <div class="plan-header has-text-left">Author edit:</span></div>
            <form id="removePicForm" action="{{ route('author.picture-delete', $author) }}" method='post'> @csrf</form>
            <form id='editForm' action="{{ route('author.update', $author) }}" method='post'
                enctype="multipart/form-data">
                <div class="field columns">
                    <div class="column is-3 is-flex is-flex-direction-column is-align-items-center">
                        <figure class="image is-128x128">
                            <img class="is-rounded" src="{{ $author->picture }}"
                                onerror="this.src='{{ asset('img/default_pic.png') }}'">
                        </figure>
                        <button class='button is-info is-small is-outline my-3' form="removePicForm">Remove picture</button>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class='label'>Name</label>
                            <div class="control has-icons-right">
                                <input class="input" type="text" name="author_name" placeholder="Name"
                                    value={{ old('author_name', $author->name) }}>
                                @error('author_name')
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                @enderror
                            </div>
                            @error('author_name')<p class="help is-danger">{{ $errors->first('author_name') }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <label class='label'>Surname</label>
                            <div class="control has-icons-right">
                                <input class="input" type="text" name="author_surname" placeholder="Surname"
                                    value={{ old('author_surname', $author->surname) }}>
                                @error('author_surname')
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                @enderror
                            </div>
                            @error('author_surname')<p class="help is-danger">{{ $errors->first('author_surname') }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <label class='label is-size-6'>Books written</label>
                            <div class="control">
                                <input class="input" type="text" name="author_books" disabled
                                    value={{ old('author_books', $author->getBooks->count()) }}>
                            </div>
                        </div>
                        <div class="field">
                            <div id="file-js-example" class="file has-name is-left is-info mt-5">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="author_picture">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Upload a picture
                                        </span>
                                    </span>
                                    <span class="file-name">
                                        No file selected
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttons control mt-5 mb-3 is-flex is-justify-content-flex-end">
                    <button form='editForm' type='submit' class="button mob-btn is-primary mr-2">Edit author</button>
                    <a href="{{ route('author.index') }}" class="button is-danger mr-2 is-outlined mob-btn">Cancel</a>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
