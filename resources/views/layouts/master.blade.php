<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Toko Management</title>
        <link rel="stylesheet" href={{asset('assets/css/main/app.css')}}>
        {{-- <link rel="stylesheet" href={{asset('assets/css/main/app-dark.css')}}> --}}
        <link rel="stylesheet" href={{asset('assets/extensions/choices.js/public/assets/styles/choices.css')}}>
        <link rel="stylesheet" href={{asset('assets/extensions/simple-datatables/style.css')}}>
        <link rel="stylesheet" href={{asset('assets/css/pages/simple-datatables.css')}}>
        <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.svg') }} type="image/x-icon">
        <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.png') }} type="image/png">
        <link rel="stylesheet" href={{ asset('assets/css/shared/iconly.css')}}>
   



    </head>

    <body>
        <div id="app">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">

                    <div class="sidebar-menu mt-4">
                        <div class="d-flex justify-content-center align-items-center">
                            
                            <div class="sidebar-toggler  x">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                        class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>

                            {{-- dashboard --}}
                            <li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                                <a href={{ url('/dashboard') }} class='sidebar-link'>
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            {{-- category --}}
                            <li class="sidebar-item {{ request()->is('category*') ? 'active' : '' }}">
                                <a href="{{ url('/category') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2"></i>
                                    <span>Categories</span>
                                </a> 
                            </li>

                            {{-- product --}}
                            <li class="sidebar-item {{ request()->is('product*') ? 'active' : '' }}">
                                <a href="{{ url('/product') }}" class='sidebar-link'>
                                    <i class="bi bi-box2"></i>
                                    <span>Products</span>
                                </a>  
                            </li>
                            <li class="sidebar-item {{ request()->is('transaction*') ? 'active' : '' }}">
                                <a href="{{ url('/transaction') }}" class='sidebar-link'>
                                    <i class="bi bi-bar-chart-line"></i>
                                    <span>Products Sale</span>
                                </a>  
                            </li>   
                            <li class="sidebar-item {{ request()->is('history/in*') ? 'active' : '' }}">
                                <a href="{{ url('/history/in') }}" class='sidebar-link'>
                                    <i class="bi bi-box-arrow-in-down-right"></i>
                                    <span>History In</span>
                                </a>  
                            </li>   
                            <li class="sidebar-item {{ request()->is('history/out*') ? 'active' : '' }}">
                                <a href="{{ url('/history/out') }}" class='sidebar-link'>
                                    <i class="bi bi-box-arrow-in-up-right"></i>
                                    <span>History Out</span>
                                </a>  
                            </li>                                                                                  

                           
                            <li class="sidebar-item  ">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    class="sidebar-link">
                                    <i class="bi bi-arrow-left-square"></i>
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                    </div>
                </div>
            </div>
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                @yield('main')

            </div>
        </div>
        {{-- @include('sweetalert::alert') --}}

        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
        <script src="assets/js/pages/simple-datatables.js"></script>
        <script src="assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
        <script src="assets/js/pages/form-element-select.js"></script>


    </body>

</html>
