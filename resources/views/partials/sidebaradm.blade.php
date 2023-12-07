<link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" >
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script type="text/javascript" src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
        <div class="nav">
            <ul>
                <li>
                    <a href="/">
                        <span class="icon"><ion-icon name="fast-food-sharp"></ion-icon></span>
                        <span class="title">Say Snack!</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/admindex">
                        <span class="icon"><ion-icon name="cube"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/akun">
                        <span class="icon"><ion-icon name="people-sharp"></ion-icon></span>
                        <span class="title">Customer</span>
                    </a>
                </li>
                
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                        <span class="title">Logout</span>
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <form action="/admin/admindex" method="GET">
                    <div class="search">
                        <label>
                            <input type="search" placeholder="Search here" name="search">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    {{-- <input type="submit" value="CARI" class="btn btn-primary"> --}}
                </form>
                <div class="name">
                    <p>{{ session('email') }}</p>
                </div>
                <div class="user">
                    <img src="{{ asset('img/heisenberg.jpg'); }}" alt="">
                </div>
            </div>
            
            