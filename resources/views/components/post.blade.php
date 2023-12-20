<div class="card">
    <div class="card-header">{{ $post->title }}</div>
    <div class="card-body">
        <p>{{ $post->content }}</p>
        <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer">{{ $post->user->name }}</footer>
        </blockquote>
        @if(Auth::user()->role == 'moderator')
            <form method="POST" action="{{ route('post.delete', ['id' => $post->id]) }}" class="d-grid gap-2 d-md-flex justify-content-md-end">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        @endif
    </div>
</div>
@include('components.comments')
