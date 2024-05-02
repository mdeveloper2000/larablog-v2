<nav>
    <div class="row text-end">        
        @auth
            <div class="col-12">
                <span class="fw-bold pe-5">Welcome, {{ auth()->user()->name }}</span>
                <a type="button" href="/users/edit/{{ auth()->user()->id }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-gear-fill"></i> Settings
                </a>
                <form method="post" method="POST" action="/logout" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="bi bi-door-open-fill"></i> Logout
                    </button>
                </form>
            </div>
        @else
            <div class="col-12">
                <a type="button" href="/login" class="btn btn-sm btn-primary" style="min-width: 100px;">
                    <i class="bi bi-lock-fill"></i> Login
                </a>
                <a button type="button" href="/register" class="btn btn-sm btn-success" style="min-width: 100px;">
                    <i class="bi bi-person-plus-fill"></i> Register
                </a>
            </div>
        @endauth
    </div>
</nav>