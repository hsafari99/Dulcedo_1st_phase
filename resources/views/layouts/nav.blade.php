<nav class="sticky-top navbar navbar-light text-nowrap bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="max-height:50px" src='/img/dulcedo-logo.jpg' alt="dulcedo-logo">
        </a>
        @auth
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        Hi, {{ Auth()->user()->firstname }}!<i class="fa fa-caret-down ml-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @include('assets.links')
                <li>
                    <a class="nav-link text-left text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Log me out<span class="fa fa-sign-out ml-1"></span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
        @endauth
    </div>
</nav>