<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a href="{{ route('home') }}" class="navbar-item">
            {{ config('app.name') }}
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-end">
        <a href="https://github.com/thijskok" class="navbar-item">
            <span class="icon">
                <i class="fab fa-github"></i>
            </span>
        </a>
        <a href="https://twitter.com/thijskok/" class="navbar-item">
            <span class="icon">
                <i class="fab fa-twitter"></i>
            </span>
        </a>
        <a href="/feed" class="navbar-item">
            <span class="icon">
                <i class="fas fa-rss"></i>
            </span>
        </a>

        @if (Auth::guest())
            <a class="navbar-item " href="{{ route('login') }}">
                <span class="icon">
                    <i class="fas fa-sign-in-alt"></i>
                </span>
            </a>
            {{--<a class="navbar-item " href="{{ route('register') }}">Register</a>--}}
        @else
            <a class="navbar-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="icon">
                    <i class="fas fa-sign-out-alt"></i>
                </span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif

    </div>
</nav>
