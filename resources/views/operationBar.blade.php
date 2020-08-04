
<div id="content" class="operations-bar">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
       <!-- social media icon -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
        <div id="social">
            <a class="facebookBtn smGlobalBtn ml-2" href="#" ></a>
            <a class="twitterBtn smGlobalBtn mx-2"  href="#" ></a>
            <a class="linkedinBtn smGlobalBtn mx-2" href="#" ></a>
        </div>
            </li>
        </ul>
        <!-- Topbar Navbar -->
        <!-- Nav Item - User Information -->
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle" src="{{url('img/user.png')}}">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/settings">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            الاعدادات
                        </a>
{{--                        <a class="dropdown-item" href="/settings">--}}
{{--                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
{{--                            الاعدادات--}}
{{--                        </a>--}}

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            @endguest
        </ul>
    </nav>
</div>
<!-- End of Topbar -->



