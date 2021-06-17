<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse col-9" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Ajanda <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                    @if(Auth::user()->status=="1" )
                        <a class="nav-link" href="{{ url('/manage') }}">Yönetim Paneli</a>
                    @endif
                </li>
            @endif
        </ul>
    </div>
    <div class="collapse navbar-collapse col-3" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Giriş') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Kayıt ol') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        @if(Auth::user()->status=='1')
                            <a class="dropdown-item" href="{{ route('mylogout') }}">Çıkış</a>
                        @else
                            <a class="dropdown-item" href="{{ route('logout') }}">Çıkış</a>
                        @endif
                    </div>
                </li>
            @endguest

        </ul>
    </div>
</nav>

{{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--            {{ config('app.name', 'Laravel') }}--}}
{{--        </a>--}}
{{--        @if(Auth::check())--}}
{{--            @if(Auth::user()->status=="1" )--}}
{{--                <a class="navbar-brand" href="{{ url('/manage') }}">--}}
{{--                    Yönetim Paneli--}}
{{--                </a>--}}
{{--            @endif--}}
{{--        @endif--}}

{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <!-- Left Side Of Navbar -->--}}
{{--            <ul class="navbar-nav mr-auto">--}}

{{--            </ul>--}}

{{--            <!-- Right Side Of Navbar -->--}}
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <!-- Authentication Links -->--}}
{{--                @guest--}}
{{--                    @if (Route::has('login'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Giriş') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Kayıt ol') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            {{ Auth::user()->name }}--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}

{{--                            @if(Auth::user()->status=='1')--}}
{{--                                <a class="dropdown-item" href="{{ route('mylogout') }}">Çıkış</a>--}}
{{--                            @else--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}">Çıkış</a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endguest--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
