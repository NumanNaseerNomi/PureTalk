<div class="card">
    <div class="card-header">{{ $post->title }}</div>
    <div class="card-body">
        <p>{{ $post->content }}</p>
        <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer">==autour name==</footer>
        </blockquote>
    </div>
</div>
@include('components.comments')
