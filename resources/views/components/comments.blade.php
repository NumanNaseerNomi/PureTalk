<div class="accordion" id="commentsAccordion{{ $post->id }}">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $post->id }}" aria-expanded="false" aria-controls="collapse{{ $post->id }}">Comments</button>
        </h2>
        <div id="collapse{{ $post->id }}" class="accordion-collapse collapse" data-bs-parent="#commentsAccordion{{ $post->id }}">
            <div class="accordion-body">
                @foreach (range(1, 10) as $number)
                    <div class="text-break"><strong>==autour name==</strong>: ==comment content==</div>
                    <hr/>
                @endforeach
                @include('components.commentCreate')
            </div>
        </div>
    </div>
</div>
