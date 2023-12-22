@include('layouts.header')
@include('components.navbar')
<div class="container">
    @include('components.alerts')
    <div class="btn-group mb-3">
        <a href="?tab=active" class="btn btn-outline-primary @if(request('tab') == 'active' || request('tab') == null) active @endif">Active</a>
        <a href="?tab=pending" class="btn btn-outline-primary @if(request('tab') == 'pending') active @endif">Pending Approvals</a>
        <a href="?tab=banned" class="btn btn-outline-primary @if(request('tab') == 'banned') active @endif">Banned</a>
        @if(Auth::user()->role == 'admin')
            <a href="?tab=moderators" class="btn btn-outline-primary @if(request('tab') == 'moderators') active @endif">Moderators</a>
        @endif
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-header">Add Moderators</div>
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
                        <input class="form-control" type="text" name="role" id="role" value="Moderator" required hidden>
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
