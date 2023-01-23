<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">

            <div class="container-fluid">

                <div class="navbar-brand px-4">
                    <div class="logo">
                        <a class="text-decoration-none text-light" href="{{route('home')}}"><h1><i class="fa-duotone fa-l"></i><i class="fa-duotone fa-f"></i></h1></a>
                    </div>
                </div>

                <div class="w-25">
                    <ul class="w-100 p-0 m-0 d-flex align-items-center justify-content-around flex-nowrap">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="text-light fs-6 text-decoration-none" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="text-light  fs-6 text-decoration-none" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item d-flex w-50 justify-content-evenly">
                            <a class="text-uppercase pb-page text-light" href="{{route('home')}}" target="_blank"><i class="fa-solid fa-earth-americas"></i></a>
                            <a class="nav-link text-uppercase pb-page text-light" href="https://github.com/LucaFabbozzo" target="_blank"><i class="fa-brands fa-github d-inline"></i></a>
                        </li>


                        <li class="nav-item">
                                <a class="dropdown-item text-light fs-6" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    <img class="avatar" src="{{ Vite::asset('resources/img/luca.jpg')}}" alt="">
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
</nav>





