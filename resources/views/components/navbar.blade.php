<nav class="navbar navbar-expand bg-body-tertiary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">PureTalk</a>
        <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/users">Users</a></li>
                            @if(Auth::user()->role == 'admin')
                            <li><a class="dropdown-item" href="/dictionary">Word Dictionary</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<br/><br/><br/>
