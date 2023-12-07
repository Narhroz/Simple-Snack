<link rel="stylesheet" href="css/styleh.css">
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- <script src="{{ asset('js/cart.js') }}" defer></script> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm mt-2">
    <div class="logo">
        <img src="img/logo.png" alt="">
    </div>
    <div class="toggle">
        <a href="#"><ion-icon name="menu"></ion-icon></a>
    </div>
    <ul class="menu">
        <li><a href="/index">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#service">Service</a></li>
        <li><a href="/contact">Contact Us</a></li>
        <li><a href="/product">Product</a></li>
        <li><a href="/cart"><ion-icon name="cart-sharp"></ion-icon><span class="badge-warning">{{ $keranjang }}</span></a></li>
    </ul>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="/admin/admindex">
                                {{ __('Admin Page') }}
                            </a>
                            <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                                {{ __('Edit profile') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(function(){
        $(".toggle").on("click", function(){
            if($(".menu").hasClass("active")){
                $(".menu").removeClass("active");
                $(this).find("a").html("<ion-icon name='menu'></ion-icon>");
            }else{
                $(".menu").addClass("active");
            }
        });
    });
</script>