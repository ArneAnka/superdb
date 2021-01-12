    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
    <div class="flex flex-col lg:flex-row items-center"> <!-- start -->
        <a href="/">
          <img class="w-32 flex-none" src="{{ asset('storage/images/logo.png') }}">
        </a>
        <ul class="flex ml-0 lg:ml-16 space-x-5 mt-6 lg:mt-0">
          <li>
            <a class="hover:text-gray-400 uppercase" href="{{ route('nes') }}">NES</a>
          </li>
          <li>
            <a class="hover:text-gray-400 uppercase" href="{{ route('snes') }}">SNES</a>
          </li>
          <li>
            <a class="hover:text-gray-400 uppercase" href="{{ route('n64') }}">N64</a>
          </li>
          <li>
            <a class="hover:text-gray-400 uppercase" href="{{ route('ngc') }}">NGC</a>
          </li>
          <li>
            <a class="hover:text-gray-400 uppercase" href="{{ route('gb') }}">GB</a>
          </li>
          <li>
            <a class="hover:text-gray-400 uppercase" href="{{ route('gba') }}">GBA</a>
          </li>
          <li>
            <a class="hover:text-gray-400 uppercase" href="{{ route('gbc') }}">GBC</a>
          </li>
        </ul>
      </div> <!-- /start -->
      <div class="flex items-center mt-6 lg:mt-0"> <!-- search -->
        <div class="relative">
          <form method="POST" action="{{ route('search.game') }}">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="text" class="bg-gray-800 text-small rounded-full focus:outline-none focus:shadow-outline md:w-64 px-3 pl-8 py-1" placeholder="Search..." name="q" autocomplete="off" value="{{ old('q') }}">
          </form>
          <div class="absolute top-0 flex items-center h-full ml-2"><svg class="text-gray-400 w-4" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.5 14.5l-4-4m-4 2a6 6 0 110-12 6 6 0 010 12z" stroke="currentColor"></path></svg></div>
        </div>
        @if (Route::has('login'))
        @auth
        <div class="ml-6">
          <div class="flex space-x-2">
            <div class="relative w-8 h-8">
              <a href="{{ route('home') }}">
                <img class="rounded-full" src="{{ Auth::user()->avatar }}" alt="avatar">
              </a>
              @if(Auth::user()->unreadNotifications->isNotEmpty())
                <div class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
              @endif
            </div>
          </div>
        </div>
        <div class="ml-6">
        <a class="underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </div>
        @else
        <div class="ml-6">
          <a href="{{ route('login') }}">Login</a>
        </div>
        @if (Route::has('register'))
          <div class="ml-6">
            <a href="{{ route('register') }}">Register</a>
          </div>
        @endif
        @endauth
      </div>  <!-- /search -->
      @endif
  </nav>

<!-- flash -->
@if ($message = Session::get('success'))
  @include('layouts.partials._flash')
@endif
<!-- /flash -->
