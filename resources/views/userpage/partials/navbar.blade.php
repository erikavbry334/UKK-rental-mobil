<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" class="{{ ($title === 'Home') ? 'active' : ''}}">Home</a></li>
                        {{-- <li><a href="/catalog" class="{{($title === 'Catalog') ? 'active' : ''}}">Catalog</a></li> --}}
                        <li><a href="/about" class="{{($title === 'About') ? 'active' : ''}}">About</a></li>
                        <li><a href="/deals" class="{{($title === 'Deals') ? 'active' : ''}}">Deals</a></li>
                        <li><a href="/reservation" class="{{($title === 'Reservation') ? 'active' : ''}}">Reservation</a></li>
                        @guest
                        <li><a href="/login" class="{{($title === 'Login') ? 'active' : ''}}">Login</a></li>
                        @endguest
                        @auth
                        <li><a href="/profile" class="{{($title === 'Login') ? 'active' : ''}}">Profile Saya</a></li>
                        @endauth
                        
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>