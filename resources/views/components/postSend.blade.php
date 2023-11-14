<div class="card">
    <div class="card-header">New Post</div>
    <div class="card-body">
        <form method="POST" action="/">
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="title" id="title">
                <label for="title">Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" id="description" style="height: 100px"></textarea>
                <label for="description">Description</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary" type="submit">Send</button>
            </div>
        </form>
    </div>
</div>
