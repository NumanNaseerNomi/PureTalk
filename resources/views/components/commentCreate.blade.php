<form class="input-group mb-3" method="POST" action="{{ route('comment.create', ['post_id' => $post->id]) }}">
    @csrf
    <textarea class="form-control" name="content" placeholder="Send new comment" aria-label="With textarea" aria-describedby="button-addon1" rows="1"></textarea>
    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Send</button>
</form>
