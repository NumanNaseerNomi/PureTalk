@include('layouts.header')
@include('components.navbar')
<div class="container">
    @include('components.alerts')
    <div class="card text-center mb-3">
        <div class="card-header">Add Word</div>
        <div class="card-body">
            <form class="input-group input-group-sm" method="POST" action="{{ route('dictionary.create') }}">
                @csrf
                <input type="text" class="form-control" name="word" aria-label="Add word" aria-describedby="button-addon1" required>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Save</button>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($words as $word)
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="collapse multi-collapse mb-3 show card-title" id="showWord">{{ $word->word }}</h5>
                        <div class="collapse multi-collapse mb-3" id="editWord">
                            <form class="input-group input-group-sm" method="POST" action="{{ route('dictionary.update', ['id' => $word->id]) }}">
                                @csrf
                                @method('PUT')
                                <input type="text" class="form-control" value="{{ $word->word }}" name="word" aria-label="Add word" aria-describedby="button-addon1" required>
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Save</button>
                            </form>
                        </div>
                        <div class="btn-group" role="group" aria-label="Small button group">
                            <form method="POST" action="{{ route('dictionary.toggleBlock', ['id' => $word->id]) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-primary">{{ $word->isBlock ? 'Unblock' : 'Block' }}</button>
                            </form>
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="showWord editWord">Edit</button>
                            <form method="POST" action="{{ route('dictionary.delete', ['id' => $word->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')
