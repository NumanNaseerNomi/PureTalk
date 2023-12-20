<div class="card">
    <div class="card-header">PROFILE</div>
    <div class="card-body">
        <form method="POST" action="/register">
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="/register">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="name" name="name" id="name" value="{{ $user->name }}">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="email" id="email"  value="{{ $user->email }}" readonly>
                        <label for="email">Email</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" type="submit">Save</button>
                    </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="email" name="email" id="email">
                        <label for="email">Old Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="password" id="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="password_confirmation" id="passwordConfirmation">
                        <label for="passwordConfirmation">Confirm Password</label>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
