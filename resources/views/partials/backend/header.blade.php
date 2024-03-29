<header class="main_menu home_menu">
    @include('partials.frontend.flash')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="{{ asset('img/logo.png') }}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="/">Frontend</a>
                            </li>
                            @can('admin-access')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Datas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/users">Users</a>                                    
                                    <a class="dropdown-item" href="/orders">Orders</a>                                    
                                    <a class="dropdown-item" href="/tag">Blogs Tags</a>                                    
                                    <a class="dropdown-item" href="/blogcategory">Blogs Categorys</a>                                    
                                    <a class="dropdown-item" href="/category">Products Categorys</a>                                    
                                    <a class="dropdown-item" href="/color">Products Colors</a>                                    
                                    <a class="dropdown-item" href="/coupon">Coupons</a>                                    
                                </div>
                            </li>
                            @endcan
                            @can('admin-webmaster')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" h id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Products
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/produit/create">New Product</a>                                    
                                    <a class="dropdown-item" href="/backoffice/produits">All Products</a>                                    
                                    <a class="dropdown-item" href="/backoffice/produits#likedProducts">Liked Products</a>                                    
                                </div>
                            </li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"  id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blogs
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/blog/create">New Blog</a>                                    
                                    <a class="dropdown-item" href="/backoffice/blogs">All Blogs</a>                                    
                                </div>
                            </li>
                            @can('admin-access')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"  id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    MailBox
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/backoffice/mailbox/contacts">Contacts</a>                                    
                                    <a class="dropdown-item" href="/backoffice/mailbox/archives">Archives</a>                                    
                                </div>
                            </li>
                            @endcan 
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        @if (Auth::check())
                        <div class="dropdown">
                            <img class="rounded-circle" src="{{ Auth::user()->image ? asset('storage/users/'.Auth::user()->image) : asset('storage/users/'.Auth::user()->imageFile) }}" alt="">
                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ Auth::user()->username }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">LogOut</button>
                                    
                                </form>
                            </ul>
                          </div>
                          <div class="dropdown cart droppp d-flex align-items-center position-relative">
                            <a class="dropdown-toggle mr-2" href="/likes" id="navbarDropdown3" role="button"
                            aria-haspopup="true" >
                           <i class=" fa-solid fa-heart"></i>
                           <div class="panierr">{{ Auth::user()->produits->count() }}</div>
                            <a class="dropdown-toggle mr-2" href="/panier" id="navbarDropdown3" role="button"
                                 aria-haspopup="true" >
                                <i class="fas fa-cart-plus"></i></a>
                            </a>
                            <div class="panier">{{ Auth::user()->panier->produitsPanier->count() }}</div>
                            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">

                                </div>
                            </div> -->
                            
                        </div>
                        @else
                            <a href="{{ route('login') }}"><i class="ti-user"></i></a>
                        @endif
                      
                        {{--  --}}
                       
                        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                            @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                        </div> --}}
                        {{-- <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot> --}}
                    
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>