@include('layouts.header')
@include('components.navbar')
<div class="container text-center">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <div class="card" style="width: 30rem;">
                <div class="card-header">LOGIN</div>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="email" name="email" id="email">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" name="password" id="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                        <hr/>
                        <div class="d-grid gap-2">
                            <a class="btn btn-outline-primary" href="/register" role="button">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
