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
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                    Kort Beskrivning av dig
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="description" type="text" value="{{ old('description', $user->description) }}" name="description" placeholder="Hej jag bor i Stockholm" autocomplete="off">
                      <p class="text-gray-600 text-xs italic">Du förfogar över 255 bokstäver för din beskrivning.</p>
                @error('description')
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

@section('scripts')
<script>
    //
    // Variables
    //

    // Get the #text element
    const textArea = document.querySelector('#text');

    // Get the #character-count element
    const characterCount = document.querySelector('#character-count');


    //
    // Functions
    //
    /**
     * Get the number of characters inside a form field
     * @param {HTMLInputElement|HTMLTextAreaElement} field The form field
     * @returns {Number} The character count
     */
    function getCharacterCount (field) {
      return field.value.length;
    }

    /**
     * Handle input events
     */
    function handleInput () {
      characterCount.textContent = getCharacterCount(this);
    }

    //
    // Inits & Event Listeners
    //
    // Handle input events
    textArea.addEventListener('input', handleInput);
    </script>
@endsection
