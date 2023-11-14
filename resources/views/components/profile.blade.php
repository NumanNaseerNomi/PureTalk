<div class="container text-center">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <div class="card" style="width: 50rem;">
                <div class="card-header">PROFILE</div>
                    <div class="card-body">
                        <form method="POST" action="/register">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="email" name="email" id="email">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" name="password" id="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" name="password_confirmation" id="passwordConfirmation">
                                <label for="passwordConfirmation">Confirm Password</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Register</button>
                            </div>
                        </form>
                        <hr/>
                        <div class="d-grid gap-2">
                            <a class="btn btn-outline-primary" href="/login" role="button">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
