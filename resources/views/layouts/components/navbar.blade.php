        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Beranda</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- <form action="/logout" method="post">
                    @csrf
                    @method('POST') --}}
                <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                    data-target="#modal-logout">
                    <i class="fa fa-power-off" aria-hidden="true"></i> Logout</button>
                {{-- </form> --}}
            </ul>
        </nav>
        <!-- /.navbar -->
        @include('pages.auth.logout-confirm')
