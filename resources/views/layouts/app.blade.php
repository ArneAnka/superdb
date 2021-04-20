<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SuperDB.cc - @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Free Nintendo Databse">
  <meta name="keywords" content="nintendo 64, super nintendo, nintendo, game boy, game boy advance, game boy color, Bergsala, Sverige, Sweden">
  
  <!-- Icon -->
  <link rel="icon" href="{{ asset('favicon.ico') }}?v=2" />
  
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  @if (App::environment('production'))
    @include ('layouts.partials._analytics')
  @endif 
  
  <!-- Styles -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  
  <!-- Any custom CSS from views are rendered here -->
  @yield('css')
  
</head>
<body class="bg-gray-900 text-white">
  <div id="app">
    <header class="border-b border-gray-800">
      @include('layouts.partials._nav')
    </header>
    
    <main class="py-8">
      @yield('content')
    </main>
  </div>
  <footer class="border-t border-gray-800">
    <div class="container mx-auto px-4 py-6">
      <div class="flex items-center bg-gray-800 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>Observera att databasen gör ett försök till att enbart innehålla titlar utgivna i Norden. Felaktigheter kan förekomma</p>
      </div>
      
      <div class="container mx-auto px-4 py-6">
        <a class="hover:text-gray-400 flex items-center" href="{{ route('om') }}">
          <svg class="mr-2" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7 4.5V5h1v-.5H7zm1-.01v-.5H7v.5h1zM8 11V7H7v4h1zm0-6.5v-.01H7v.01h1zM6 8h1.5V7H6v1zm0 3h3v-1H6v1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zM1 7.5A6.5 6.5 0 017.5 1V0A7.5 7.5 0 000 7.5h1zM7.5 14A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zm0 1A7.5 7.5 0 0015 7.5h-1A6.5 6.5 0 017.5 14v1z" fill="currentColor"></path></svg>
          Om SuperDB
        </a>
        <a class="hover:text-gray-400 flex items-center" href="{{ route('tos') }}">
          <svg class="mr-2" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 6.995H4v1h.5v-1zm6 1h.5v-1h-.5v1zm-6 1.998H4v1h.5v-1zm6 1.007h.5v-1h-.5v1zm-6-7.003H4v1h.5v-1zM8.5 5H9V4h-.5v1zm2-4.5l.354-.354L10.707 0H10.5v.5zm3 3h.5v-.207l-.146-.147-.354.354zm-9 4.495h6v-1h-6v1zm0 2.998l6 .007v-1l-6-.007v1zm0-5.996L8.5 5V4l-4-.003v1zm8 9.003h-10v1h10v-1zM2 13.5v-12H1v12h1zM2.5 1h8V0h-8v1zM13 3.5v10h1v-10h-1zM10.146.854l3 3 .708-.708-3-3-.708.708zM2.5 14a.5.5 0 01-.5-.5H1A1.5 1.5 0 002.5 15v-1zm10 1a1.5 1.5 0 001.5-1.5h-1a.5.5 0 01-.5.5v1zM2 1.5a.5.5 0 01.5-.5V0A1.5 1.5 0 001 1.5h1z" fill="currentColor"></path></svg>
          Integritetspolicy
        </a>
        <a class="hover:text-gray-400 flex items-center" href="{{ route('users') }}">
          <svg class="mr-2" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M3 13v.5h1V13H3zm8 0v.5h1V13h-1zm-7 0v-.5H3v.5h1zm2.5-3h2V9h-2v1zm4.5 2.5v.5h1v-.5h-1zM8.5 10a2.5 2.5 0 012.5 2.5h1A3.5 3.5 0 008.5 9v1zM4 12.5A2.5 2.5 0 016.5 10V9A3.5 3.5 0 003 12.5h1zM7.5 3A2.5 2.5 0 005 5.5h1A1.5 1.5 0 017.5 4V3zM10 5.5A2.5 2.5 0 007.5 3v1A1.5 1.5 0 019 5.5h1zM7.5 8A2.5 2.5 0 0010 5.5H9A1.5 1.5 0 017.5 7v1zm0-1A1.5 1.5 0 016 5.5H5A2.5 2.5 0 007.5 8V7zm0 7A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0z" fill="currentColor"></path></svg>
          Användare
        </a>
        <a class="hover:text-gray-400 flex items-center" href="{{ route('points') }}">
          <svg class="mr-2" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 12.04l-4.326 2.275L4 9.497.5 6.086l4.837-.703L7.5 1l2.163 4.383 4.837.703L11 9.497l.826 4.818L7.5 12.041z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Poäng
        </a>
        <a class="hover:text-gray-400 flex items-center" href="{{ route('game.genres') }}">
          <svg class="mr-2" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4 6h1V5H4v1zm6 0h1V5h-1v1zm.1 2.7a3.25 3.25 0 01-5.2 0l-.8.6c1.7 2.267 5.1 2.267 6.8 0l-.8-.6zM1 5V2.5H0V5h1zm1.5-4H5V0H2.5v1zM1 2.5A1.5 1.5 0 012.5 1V0A2.5 2.5 0 000 2.5h1zM0 10v2.5h1V10H0zm2.5 5H5v-1H2.5v1zM0 12.5A2.5 2.5 0 002.5 15v-1A1.5 1.5 0 011 12.5H0zM10 1h2.5V0H10v1zm4 1.5V5h1V2.5h-1zM12.5 1A1.5 1.5 0 0114 2.5h1A2.5 2.5 0 0012.5 0v1zM10 15h2.5v-1H10v1zm5-2.5V10h-1v2.5h1zM12.5 15a2.5 2.5 0 002.5-2.5h-1a1.5 1.5 0 01-1.5 1.5v1z" fill="currentColor"></path></svg>
          Genres
        </a>
      </div>
      @include('layouts.partials._footer')
    </div>
  </footer>
  
  <!-- Any extra scripts from views are rendered here -->
  @yield('scripts')
</body>
</html>
