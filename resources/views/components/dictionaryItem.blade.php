<div class="col-md-3 mb-3">
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title mb-3">{{ $word->word }}</h5>
            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                <button type="button" class="btn btn-outline-primary">Block</button>
                <button type="button" class="btn btn-outline-primary">Unblock</button>
                <form action="{{ route('dictionary.delete', ['id' => $word->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
