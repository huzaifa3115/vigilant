<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow no-bt-margin">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a class="title-anchor" href="{{ route('index') }}">Vigilant Trading Group</a>
        </h5>
            <nav class="navbar navbar-expand-lg my-2 my-md-0 mr-md-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="p-2 text-dark" href="{{ route('disclaimer') }}">Disclaimer</a>
                        </li>
                        <li class="nav-item">
                            <a class="p-2 text-dark" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="p-2 text-dark" href="#">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="p-2 text-dark" href="{{ route('pricing') }}">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="p-2 text-dark" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="p-2 text-dark" href="{{ route('index') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <a class="btn btn-outline-primary" href="{{ route('support') }}">Support</a>

            @if(Auth::user())
            <li class="nav-item dropdown" style="list-style: none;margin-left: 5px;">
                <a id="navbarDropdown" class="btn btn-outline-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            <!-- <a class="btn btn-outline-primary" href="{{ route('support') }}">{{ Auth::user()->name }}</a> -->
        <!-- <a class="btn btn-outline-primary" href="{{ route('support') }}">Support</a> -->


        @endif
    </div>
