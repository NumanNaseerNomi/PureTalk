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
                <td>
                    <span class="collapse multi-collapse-{{ $user->id }} show" id="showName">{{ $user->name }}</span>
                    <div class="collapse multi-collapse-{{ $user->id }}" id="editName">
                        <form class="input-group input-group-sm" method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control" value="{{ $user->name }}" name="name" aria-label="Add name" aria-describedby="button-addon1" required>
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Save</button>
                        </form>
                    </div>
                </td>
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
                            <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse-{{ $user->id }}" aria-expanded="false" aria-controls="showName editName">Edit</button>
                            <button type="submit" class="btn btn-outline-primary btn-sm">Delete</button>
                        </form>
                    @endif
                    @if(Auth::user()->role == 'moderator' && request('tab', 'active') == 'active')
                        <button class="btn btn-outline-primary btn-sm collapse multi-collapse-ban-{{ $user->id }} show" type="button" id="banButton" data-bs-toggle="collapse" data-bs-target=".multi-collapse-ban-{{ $user->id }}" aria-expanded="false" aria-controls="banButton timeInput">Ban</button>
                        <div class="collapse multi-collapse-ban-{{ $user->id }}" id="timeInput">
                            <form class="input-group input-group-sm" method="POST" action="{{ route('user.ban', ['id' => $user->id]) }}">
                                @csrf
                                @method('PUT')
                                <input type="datetime-local" class="form-control" value="{{ $user->bannedTill }}" min="{{ now() }}" name="bannedTill" aria-label="Select datetime" aria-describedby="button-addon1" required>
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Ban</button>
                                <button class="btn btn-outline-secondary" type="button" id="banButton" data-bs-toggle="collapse" data-bs-target=".multi-collapse-ban-{{ $user->id }}" aria-expanded="false" aria-controls="banButton timeInput">Cancel</button>
                            </form>
                        </div>
                    @endif
                    @if(Auth::user()->role == 'moderator' && request('tab') == 'banned')
                        <form method="POST" action="{{ route('user.ban', ['id' => $user->id]) }}">
                            @csrf
                            @method('PUT')
                            <input type="datetime-local" name="bannedTill" hidden>
                            <button type="submit" class="btn btn-outline-primary btn-sm">Unban</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
