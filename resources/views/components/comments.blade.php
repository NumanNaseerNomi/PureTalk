<div class="accordion" id="commentsAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Comments</button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#commentsAccordion">
            <div class="accordion-body">
                @foreach (range(1, 10) as $number)
                    <div class="text-break"><strong>==autour name==</strong>: ==comment content==</div>
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>
</div>
