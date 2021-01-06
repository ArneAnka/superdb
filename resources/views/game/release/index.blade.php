@extends('layouts.app')

@section('title', "ändra release " . $release->release . " för " . $game->title)

@section('css')

@endsection

@section('content')

<div class="container mx-auto px-4">
    <div class="w-full">
    <h2 class="text-xl">Ändra release "{{ $release->release }}" för "{{ $game->title }}"</h2>
    <form method="POST" action="{{ route('game.release.update', [$game, $release]) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <!-- box -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="box">
                Edit Box
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="box"
              type="text"
              class="@error('box') border-red-500 @enderror"
              name="box"
              value="{{ old('box', $release->box) }}" placeholder="ex. SNSP-AR-SCN"
              autocomplete="off">
              @error('box')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- pcb -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="pcb">
                Edit PCB
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="pcb"
              type="text"
              class="@error('pcb') border-red-500 @enderror"
              name="pcb"
              value="{{ old('pcb', $release->pcb) }}" placeholder="ex. SHVC-1A3B-13"
              autocomplete="off">
              @error('pcb')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- manual -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="manual">
                Edit Manual
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="manual"
              type="text"
              class="@error('manual') border-red-500 @enderror"
              name="manual"
              value="{{ old('manual', $release->manual) }}" placeholder="ex. SNSP-AR-SCN"
              autocomplete="off">
              @error('manual')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- cartridge_front -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="cartridge_front">
                Edit Cartridge Front
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="cartridge_front"
              type="text"
              class="@error('cartridge_front') border-red-500 @enderror"
              name="cartridge_front"
              value="{{ old('cartridge_front', $release->cartridge_front) }}" placeholder="ex. SNSP-AR-SCN"
              autocomplete="off">
              @error('cartridge_front')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- cartridge_back -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="cartridge_back">
                Edit Cartridge Back
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="cartridge_back"
              type="text"
              class="@error('cartridge_back') border-red-500 @enderror"
              name="cartridge_back"
              value="{{ old('cartridge_back', $release->cartridge_back) }}" placeholder="ex. SNSP-UKV"
              autocomplete="off">
              @error('cartridge_back')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- cartridge_number -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="cartridge_number">
                Edit Cartridge Number
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="cartridge_number"
              type="text"
              class="@error('cartridge_number') border-red-500 @enderror"
              name="cartridge_number"
              value="{{ old('cartridge_number', $release->cartridge_number) }}" placeholder="ex. SNSP-UKV"
              autocomplete="off">
              @error('cartridge_number')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- inner_box -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="inner_box">
                Edit Inner Box
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="inner_box"
              type="text"
              class="@error('inner_box') border-red-500 @enderror"
              name="inner_box"
              value="{{ old('inner_box', $release->inner_box) }}" placeholder="ex. Fyrsidig normal"
              autocomplete="off">
              @error('inner_box')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- register_pampflet -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="register_pampflet">
                Edit Register Pampflet
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="register_pampflet"
              type="text"
              class="@error('register_pampflet') border-red-500 @enderror"
              name="register_pampflet"
              value="{{ old('register_pampflet', $release->register_pampflet) }}" placeholder="ex. SNSP-SCN"
              autocomplete="off">
              @error('register_pampflet')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- booklet -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="booklet">
                Edit Booklet
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="booklet"
              type="text"
              class="@error('booklet') border-red-500 @enderror"
              name="booklet"
              value="{{ old('booklet', $release->booklet) }}" placeholder="ex. SNSP-SCN-1"
              autocomplete="off">
              @error('booklet')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- special -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="special">
                Edit Special
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="special"
              type="text"
              class="@error('special') border-red-500 @enderror"
              name="special"
              value="{{ old('special', $release->special) }}" placeholder="ex. SNSP-UKV"
              autocomplete="off">
              @error('special')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

        <!-- misc -->
        @forelse($release->misc as $key => $misc)
        <!-- {{ $key }} -->
          <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="{{ $key }}">
                Edit {{ $key }}
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="{{ $key }}"
              type="text"
              class="@error('{{ $key }}') border-red-500 @enderror"
              name="misc[{{ $key }}]"
              value="{{ old('$misc', $misc) }}" placeholder="ex. SNSP-SCN-1"
              autocomplete="off">
              @error('{{ $key }}')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>
          @empty
            asd
          @endforelse

        <input type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value="Ändra">
    </form>
    </div>
</div>

@endsection
