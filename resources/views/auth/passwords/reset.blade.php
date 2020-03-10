@extends('layouts.app')

@section('title', 'reset password')

@section('content')
<div class="">
    <div class="">{{ __('Reset Password') }}</div>

    <div class="">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    <button type="submit" class="">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
