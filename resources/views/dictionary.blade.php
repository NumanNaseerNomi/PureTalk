@include('layouts.header')
@include('components.navbar')
<div class="container">
    <div class="card text-center mb-3">
        <div class="card-header">Add Word</div>
        <div class="card-body">
            <form class="input-group input-group-sm" method="POST" action="/dictionary/create">
                @csrf
                <input type="text" class="form-control" name="word" aria-label="Add word" aria-describedby="button-addon1" required>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Save</button>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($words as $word)
            @include('components.dictionaryItem')
        @endforeach
    </div>
</div>
@include('layouts.footer')
