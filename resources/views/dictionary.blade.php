@include('layouts.header')
@include('components.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-header">Add Word</div>
                <div class="card-body">
                    <form class="input-group input-group-sm" method="POST" action="/">
                        <input type="text" class="form-control" name="word" aria-label="Add word" aria-describedby="button-addon1" required>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Save</button>
                    </form>
                </div>
            </div>
        </div>
        @foreach (range(1, 10) as $number)
            @include('components.dictionaryItem')
        @endforeach
    </div>
</div>
@include('layouts.footer')
