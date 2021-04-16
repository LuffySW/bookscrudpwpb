@if ($message)
    <div class="notification is-primary is-three-quarters column">
        <button class="delete delete-notification"></button>
        {{ session()->get('success_message') }}
    </div>
@elseif (!$message)
    <div class="notification is-danger is-three-quarters column">
        <button class="delete delete-notification"></button>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
