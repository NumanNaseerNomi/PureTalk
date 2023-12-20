@include('layouts.header')
@include('components.navbar')
<div class="container text-center">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <div class="card" style="width: 30rem;">
                <div class="card-header">LOGIN</div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul class="alert alert-danger ps-4 text-start" role="alert">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" type="email" name="email" id="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" name="password" id="password" required>
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
