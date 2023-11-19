<div class="card">
    <div class="card-header">New Post</div>
    <div class="card-body">
        <form method="POST" action="/post/create">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="title" id="title" required>
                <label for="title">Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="content" id="content" style="height: 100px" required></textarea>
                <label for="content">Content</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary" type="submit">Send</button>
            </div>
        </form>
    </div>
</div>
