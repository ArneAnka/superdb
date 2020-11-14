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
          <div class="flex space-x-2">
            <div class="relative w-8 h-8">
              <a href="{{ route('user.show', Auth::user()) }}">
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

@if ($message = Session::get('success'))
  <div class="rounded-md bg-green-50 p-4"> <!-- början -->
  <div class="flex">
    <div class="flex-shrink-0">
      <svg class="h-5 w-5 text-green-400" viewbox="0 0 20 20" fill ="currentColor">
        <path fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586
          7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
          cliprule="evenodd" />
      </svg>
    </div>
    <div class="ml-3">
      <p class="text-sm leading-5 font-medium text-green-800">
        {{ $message }}
      </p>
    </div>
    <div class="ml-auto pl-3">
      <div class="-mx-1.5 -my-1.5">
        <button type="button"
        class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100
        focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
        aria-label="Dissmiss">
          <svg class="h-5 w-5" viewbox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 9 911.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.923 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
      </div>
    </div>
  </div>
  </div><!-- slut -->
@endif
