<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a href="{{ route('home') }}" class="navbar-item">
            <h1>
                <span class="has-text-weight-bold">Thijs Kok</span>
                <span class="has-text-grey-light"> / Developer blog</span></h1>
        </a>

        <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-menu" id="navMenu">
        <div class="navbar-end">

            @inject('pages', 'App\Services\PageService')
            @foreach($pages->all() as $page)
                <a href="{{ route('page', $page) }}"
                   class="navbar-item @if (route('page', $page) === url()->current()) is-active @endif">
                    {{ $page->title }}
                </a>
            @endforeach

            <a href="https://github.com/thijskok" class="navbar-item">
                <span class="icon">
                    <i class="fab fa-github"></i>
                </span>
                <span class="is-hidden-desktop">Github</span>
            </a>
            <a href="https://twitter.com/thijskok/" class="navbar-item">
                <span class="icon">
                    <i class="fab fa-twitter"></i>
                </span>
                <span class="is-hidden-desktop">Twitter</span>
            </a>
            <a href="/feed" class="navbar-item">
                <span class="icon">
                    <i class="fas fa-rss"></i>
                </span>
                <span class="is-hidden-desktop">RSS</span>
            </a>

            @if (Auth::guest())
                <a class="navbar-item " href="{{ route('login') }}">
                    <span class="icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    <span class="is-hidden-desktop">Sign in</span>
                </a>
                {{--<a class="navbar-item " href="{{ route('register') }}">Register</a>--}}
            @else
                <a class="navbar-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span class="is-hidden-desktop">Sign out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif

        </div>
    </div>
</nav>
