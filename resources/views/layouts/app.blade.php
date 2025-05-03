<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- Top Navbar -->
        <nav class="main-navbar">
            <div class="navbar-container">
                <div class="navbar-brand">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <div class="navbar-right">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                        @endif
                    @else
                        <div class="user-menu">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <div class="app-wrapper">
            @auth
                @if (auth()->user()->role->name == 'super_admin' ||
                        auth()->user()->role->name == 'admin' ||
                        auth()->user()->role->name == 'trainer' ||
                        auth()->user()->role->name == 'student')
                    <aside class="sidebar">
                        <div class="sidebar-content">

                            <div class="nav-section">
                                <div class="nav-group">
                                    <div class="nav-group-title">Main Menu</div>
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('home') }}"
                                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                                <i class="fas fa-home"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="nav-group">
                                    <div class="nav-group-title">Management</div>
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('user.index') }}"
                                                class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                                                <i class="fas fa-users"></i>
                                                <span>Users</span>
                                            </a>
                                        </li>
                                        @if (auth()->user()->role->name == 'super_admin')
                                            <li class="nav-item">
                                                <a href="{{ route('role.index') }}"
                                                    class="nav-link {{ request()->routeIs('role.*') ? 'active' : '' }}">
                                                    <i class="fas fa-user-shield"></i>
                                                    <span>Roles</span>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="nav-item">
                                            <a href="{{ route('trainings.index') }}"
                                                class="nav-link {{ request()->routeIs('trainings.*') ? 'active' : '' }}">
                                                <i class="fas fa-graduation-cap"></i>
                                                <span>Trainings</span>
                                            </a>
                                        </li>
                                        @if (auth()->user()->role->name == 'super_admin')
                                            <li class="nav-item">
                                                <a href="{{ route('company.index') }}"
                                                    class="nav-link {{ request()->routeIs('company.*') ? 'active' : '' }}">
                                                    <i class="fas fa-building"></i>
                                                    <span>Companies</span>
                                                </a>
                                            </li>

                                            <div class="dropdown nav-item">
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                    class="nav-link">
                                                    <i class="fa fa-home"></i>
                                                    Home
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('header.index') }}">Header</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('features.index') }}">Features</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('mission.index') }}">Mission</a></li>
                                                </ul>
                                            </div>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="user-dropdown" onclick="document.getElementById('logout-form').submit();">
                                <div class="user-info">
                                    <div class="user-name">{{ Auth::user()->name }}</div>
                                    <div class="user-role">{{ Auth::user()->role->name }}</div>
                                </div>
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                        </div>
                    </aside>

                    <!-- Main Content -->
                    <main class="main-content">
                        @yield('content')
                    </main>
                @else
                    <main class="main-content-full">
                        @yield('content')
                    </main>
                @endif
            @endauth

            @guest
                <main class="main-content-full">
                    @yield('content')
                </main>
            @endguest
        </div>
    </div>

    @livewireScripts
</body>

</html>
