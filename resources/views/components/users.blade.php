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
                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                        @if(Auth::user()->role == 'admin' && request('tab') == 'pending')
                            <button type="button" class="btn btn-outline-primary">Approve</button>
                        @endif
                        <button type="button" class="btn btn-outline-primary">Middle</button>
                        <button type="button" class="btn btn-outline-primary">Right</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
