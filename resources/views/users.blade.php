@include('layouts.header')
@include('components.navbar')
<div class="container">
    @include('components.alerts')
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-header">Register User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="name" id="name" required>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="email" id="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password" id="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password_confirmation" id="passwordConfirmation" required>
                            <label for="passwordConfirmation">Confirm Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="role">
                                <option value="user" selected>User</option>
                                <option value="moderator">Moderator</option>
                            </select>
                            <label for="floatingSelect">Role</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach (range(1, 10) as $number)
        @endforeach
    </div>
</div>
@include('layouts.footer')
