@extends('layouts.app')

@section('title', 'register')

@section('content')
<div class="">{{ __('Register') }}</div>

<div class="">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="">
            <label for="name" class="">{{ __('Name') }}</label>

            <div class="">
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="email" class="">{{ __('E-Mail Address') }}</label>

            <div class="">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="password" class="">{{ __('Password') }}</label>

            <div class="">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

            <div class="">
                <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="">
            <div class="">
                <button type="submit" class="primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
