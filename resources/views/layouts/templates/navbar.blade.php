<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>ZenkFood</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>

    @guest
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="/" class="nav-item nav-link  {{ Request::is('home') ? 'active' : ''}}">Home</a>
            <a href="/menu" class="nav-item nav-link  {{ Request::is('menu') ? 'active' : ''}}">Menu</a>
            <a href="/booking" class="nav-item nav-link  {{ Request::is('booking') ? 'active' : ''}}">Booking</a>
            <a href="/order" class="nav-item nav-link  {{ Request::is('order') ? 'active' : ''}}">Order</a>
        </div>
        <a href="/login" class="btn btn-primary py-2 px-4">Login</a>
    </div>
    @endguest

    @auth
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="/dashboard" class="nav-item nav-link  {{ Request::is('dashboard') ? 'active' : ''}}">Home</a>
            <a href="/dashboard/booking" class="nav-item nav-link  {{ Request::is('dashboard/booking') ? 'active' : ''}}">Booking</a>
            <a href="/dashboard/order" class="nav-item nav-link  {{ Request::is('dashboard/order') ? 'active' : ''}}">Order</a>
            <a href="/dashboard/transaction" class="nav-item nav-link  {{ Request::is('dashboard/transaction') ? 'active' : ''}}">Transaksi</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->nama_user }}</a>
                <div class="dropdown-menu m-0">
                    <form action="{{ route('logout.perform') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item" style="{background: none;
                            color: inherit;
                            border: none;
                            font: inherit;
                            cursor: pointer;
                            outline: inherit;}">
                          Log Out <span data-feather="log-out"></span>
                        </button>
                      </form>
                </div>
            </div>
        </div>
        
    </div>
    @endauth

</nav>