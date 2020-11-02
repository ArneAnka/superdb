    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
    <div class="flex flex-col lg:flex-row items-center"> <!-- start -->
        <a href="/">
          <img class="w-32 flex-none" src="{{ asset('images/logo.png') }}">
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
            <input type="text" class="bg-gray-800 text-small rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1" placeholder="Search..." name="q" autocomplete="off">
          </form>
          <div class="absolute top-0 flex items-center h-full ml-2"><svg class="text-gray-400 w-4" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.5 14.5l-4-4m-4 2a6 6 0 110-12 6 6 0 010 12z" stroke="currentColor"></path></svg></div>
        </div>
        @if (Route::has('login'))
        @auth
        <div class="ml-6">
          <a href="{{ route('user.show', Auth::user()) }}">
            <img class="rounded-full w-8" src="{{ Auth::user()->avatar }}" alt="avatar">
          </a>
        </div>
        <div class="ml-6">
          Logout
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

@if ($message = Session::get('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ $message }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
  </div>
@endif
