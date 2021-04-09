<img class="inline-block rounded-full h-6 w-6" src="{{ $item->user->avatar }}" alt="avatar for root" />
@if($item->user->name == "root")
    <span>{{ $item->user->name }} ♔</span>
@else
    <span>{{ $item->user->name }}</span>
@endif