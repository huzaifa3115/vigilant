<div
    class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow no-bt-margin">
    <h5 class="my-0 mr-md-auto font-weight-normal row ">
        <button data-trigger="navbar_main" class="d-lg-none btn btn-warning" type="button"><span
                class="navbar-toggler-icon"></span></button>
        <a class="title-anchor" style="margin-top: 8px;" href="{{ route('index') }}"><img src="{{url('/assets/img/v-logo.png')}}" alt="Vigilant Trading Logo" class="header-logo"/></a>
    </h5>

<span class="screen-darken"></span>


    <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="offcanvas-header text-right">
                <button class="btn-close float-end">X</button>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item mt-2 active">
                    <a class="p-2 text-dark" href="{{ route('disclaimer') }}">Disclaimer</a>
                </li><br>
                <li class="nav-item mt-2">
                    <a class="p-2 text-dark" href="{{ route('blog') }}">Blog</a>
                </li>
                <br>
                <li class="nav-item mt-2">
                    <a class="p-2 text-dark" href="{{ route('review') }}">Reviews</a>
                </li>
                <br>
                <li class="nav-item mt-2">
                    <a class="p-2 text-dark" href="{{ route('pricing') }}">Pricing</a>
                </li>
                <br>
                <li class="nav-item mt-2">
                    <a class="p-2 text-dark" href="{{ route('about') }}">About Us</a>
                </li>
                <br>
                <li class="nav-item mt-2">
                    <a class="p-2 text-dark" href="{{ route('index') }}">Home</a>
                </li>
                <br>
                 <li class="nav-item mt-2">
                    <a class="p-2 text-dark" href="{{ route('support') }}">Support</a>
                </li>
                <a class="btn btn-outline-primary support_btn" href="{{ route('pricing') }}">Upgrade</a>
                   @if(Auth::user())
                <li class="nav-item dropdown auth-header-btn" style="list-style: none;margin-left: 15px;">
                    <a id="navbarDropdown" class="btn btn-outline-primary" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endif
            </ul>

        </div> <!-- container-fluid.// -->
    </nav>



</div>
