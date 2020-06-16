@if($item->user->name == "root")
    <span style="color: red;">{{ $item->user->name }}</span>
@else
    <span>{{ $item->user->name }}</span>
@endif
