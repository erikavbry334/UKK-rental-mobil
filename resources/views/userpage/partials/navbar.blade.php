<header class="header-area header-sticky background-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo ms-4">
                        <img src="{{ asset('assets/images/logo5.png') }}" alt="logo" style="width: 170px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" class="{{ ($title === 'Home') ? 'active' : ''}}">Beranda</a></li>
                        {{-- <li><a href="/catalog" class="{{($title === 'Catalog') ? 'active' : ''}}">Catalog</a></li> --}}
                        <li><a href="/syarat-ketentuan" class="{{($title === 'syaratketentuan') ? 'active' : ''}}">Tentang</a></li>
                        <li><a href="/kontakkami" class="{{($title === 'Kontak Kami') ? 'active' : ''}}">Kontak Kami</a></li>
                        @guest
                        <li><a href="/login" class="{{($title === 'Login') ? 'active' : ''}}">Login</a></li>
                        @endguest
                        @auth
                        <li>
                            <a href="/profile" class="{{($title === 'profile')}}">
                                <img src="{{ asset(auth()->user()->avatar_url) }}" style="border-radius: 99999px; width: 32px; height: 32px; object-fit: cover">
                            </a>
                        </li>
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