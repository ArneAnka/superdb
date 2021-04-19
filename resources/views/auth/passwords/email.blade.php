@extends('layouts.app')

@section('title', 'reset password')

@section('content')
<div class="container flex justify-center">
    <div class="w-full max-w-xs">
        <h1>{{ __('Reset Password') }}</h1>
        
        <div class="">
            @if (session('status'))
            <div class="" role="alert">
                {{ session('status') }}
            </div>
            @endif
            
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('password.email') }}">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email" class="">{{ __('E-Mail Address') }}</label>
                    
                    <input id="email" type="email" class="shadow appearance-none border @error('email') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    @error('email')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection
    