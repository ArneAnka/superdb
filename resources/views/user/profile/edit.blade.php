@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Edit the profile, {{ $user->name }}</h2>


        <form class="w-full max-w-lg" method="POST" action="{{ route('user.edit.update', $user) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Username
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" value="{{ old('name', $user->name) }}" name="name" placeholder="Mario" autocomplete="off">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Email
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('email') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="email" value="{{ old('email', $user->email) }}" name="email" placeholder="info@superdb.cc" autocomplete="off">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide  @error('password') border-red-500 @enderror text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Password
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" name="password" placeholder="******************" required="" autocomplete="off">
    @error('password')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Password
    </label>
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" name="password_confirmation" placeholder="******************" required="" autocomplete="off">
</div>
</div>
<div class="flex items-center justify-between">
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
    Spara
</button>
</div>
</form>
</div> <!-- end container -->
</div>
@endsection
