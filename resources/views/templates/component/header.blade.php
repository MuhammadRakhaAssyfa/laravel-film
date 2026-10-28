<div class="header">
  <div class="container">
    <div class="w3layouts_logo">
      <a href="{{ route('home') }}"><h1>One<span>Movies</span></h1></a>
    </div>
    <div class="w3_search">
      <form action="{{ route('movies.search') }}" method="get">
        <input type="text" name="q" placeholder="Search" required="" value="{{ request('q') }}">
        <input type="submit" value="Go">
      </form>
    </div>
    <div class="w3l_sign_in_register">
      <ul>
        @guest
          <li><a href="{{ route('login.login') }}">Login</a></li>
          <li><a href="{{ route('register.create') }}">Register</a></li>
        @endguest

        @can('admin')
          <li><a href="{{ route('dashboard.admin') }}">{{ Auth::user()->name }}</a></li>
        @endcan

        @can('user')
          <li><a href="{{ route('dashboard.user') }}">{{ Auth::user()->name }}</a></li>
        @endcan

        @auth
          <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          </li>
        @endauth
      </ul>

      <form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>