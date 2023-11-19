<div class="col-md-3 mb-3">
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title mb-3">{{ $word->word }}</h5>
            <div class="btn-group" role="group" aria-label="Small button group">
                <form method="POST" action="{{ route('dictionary.toggleBlock', ['id' => $word->id]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-outline-primary">{{ $word->isBlock ? 'Unblock' : 'Block' }}</button>
                </form>
                <form method="POST" action="{{ route('dictionary.delete', ['id' => $word->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
