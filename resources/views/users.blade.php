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
    @if(Auth::user()->role == 'admin' && request('tab') == 'moderators')
        @include('components.moderatorCreate')
    @endif
</div>
@include('layouts.footer')
