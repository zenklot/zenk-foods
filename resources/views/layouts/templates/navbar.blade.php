<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>ZenkFood</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="/" class="nav-item nav-link {{ $active == 'home'  ? 'active' : ''}}">Home</a>
            <a href="/menu" class="nav-item nav-link {{ $active == 'menu'  ? 'active' : ''}}">Menu</a>
            <a href="/booking" class="nav-item nav-link {{ $active == 'booking'  ? 'active' : ''}}">Booking</a>
            <a href="/order" class="nav-item nav-link {{ $active == 'order'  ? 'active' : ''}}">Order</a>
        </div>
        <a href="/login" class="btn btn-primary py-2 px-4">Login</a>
    </div>
</nav>