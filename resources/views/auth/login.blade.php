@extends('layouts.app')

@section('title', 'login')

@section('content')
<div class="container flex justify-center">
  <div class="w-full max-w-xs">
    
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{ route('login') }}">
      @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          {{ __('E-Mail Address') }}
        </label>
        <input class="shadow appearance-none border @error('email') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email" placeholder="email" value="{{ old('email') }}">
        @error('email')
        <p class="text-red-500 text-xs italic">Fel email eller lösenord.</p>
        @enderror
      </div>
      
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          {{ __('Password') }}
        </label>
        <input class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************" required>
        @error('password')
        <p class="text-red-500 text-xs italic">Please enter a password.</p>
        @enderror
      </div>
      
      <div class="mb-6">
        <label class="block text-gray-500 font-bold">
          <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <span class="text-sm">
            <label class="" for="remember">
              {{ __('Remember Me') }}
            </label>
          </span>
        </label>
      </div>
      
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection
