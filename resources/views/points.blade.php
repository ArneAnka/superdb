@extends('layouts.app')

@section('title', 'Om superdb.cc')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-xl text-blue-500 uppercase tracking-wide font-semibold">
            Poängsystem på Superdb.cc
        </h2>
    <p>Du erhåller poäng baserat på ditt deltagande. Desto högre poäng, desto mer delaktighet i sidan tjänar du.</p>
    <p>Enligt följande fördelas poängen:</p>
    <div>
        <ul class="list-disc list-inside">
            <li>En kommentar, 5 poäng.</li>
            <li>En post, 10 poäng.</li>
            <li>En uppdaterad rad för en titel, 2 poäng.</li>
            <li>En uppladdad bild, 12 poäng.</li>
        </ul>
    </div>
    </div> <!-- end container -->
</div>
@endsection
