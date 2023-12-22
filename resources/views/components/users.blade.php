<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            @if(request('tab') == 'banned')
                <th scope="col">Banned Till</th>
            @endif
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @if(request('tab') == 'banned')
                    <td>{{ $user->bannedTill }}</td>
                @endif
                <td>
                    @if(Auth::user()->role == 'admin' && request('tab') == 'pending')
                        <form method="POST" action="{{ route('user.approve', ['id' => $user->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary btn-sm">Approve</button>
                        </form>
                    @endif
                    @if(Auth::user()->role == 'admin' && request('tab') == 'moderators')
                        <form method="POST" action="{{ route('user.delete', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-primary btn-sm">Delete</button>
                        </form>
                    @endif
                    @if(Auth::user()->role == 'moderator' && request('tab') == 'active')
                        <button type="button" class="btn btn-outline-primary btn-sm">Ban</button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
