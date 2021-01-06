@extends('layouts.app')

@section('title', 'Om superdb.cc')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold mb">
            Om SuperDB.cc
        </h2>
        <div>
            Denna sida är till för att ge en överblick över de spel som framförallt Bergsala har släppt i Sverige. Sidan är skapad eftersom att det inte finns/fanns en för alla tillgänglig databas över dessa speltitlar.
        </div>

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Data</h2>
        <div>
            Datan är insamlad under en lång tidshorisont i en mängd olika format. SuperDB är i nuläget en "crowdsource-ad" databas då det finns möjlighet för enskilda användare att redigera enskild speltitlar. Ha som utgångspunkt att datan som presenteras <i>kan</i> vara direkt felaktig.
        </div>
        <div>
            <ul class="list-disc list-inside">
            @foreach($consoles as $console)
               <li>{{ $console->name }}, {{ $console->games_count }} titlar</li>
            @endforeach
            </ul>
        </div>

        <div>
            Totalt: {{ $histories[0]->history }} redigeringar gjorda.
        </div>

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Hjälp till</h2>
        <div>
            Har du idéer på förbättringar eller vill hjälpa till i projektet? Hör av dig via mejl.
        </div>
        <div>
            Projektet är byggt med <a class="underline" href="https://laravel.com/">Laravel</a>, <a class="underline" href="https://teenyicons.com/">Teenyicons</a> och <a class="underline" href="https://tailwindcss.com/">Tailwind CSS</a>. Projektet körs på nginx hos <a class="underline" href="https://www.digitalocean.com/">Digitalocean</a> på en ubuntu droplet.
        </div>
        <div>
            Projektet använder givetvis git för versionshantering 🔥
        </div>

        <div>
            <span>
                <a class="underline" href="mailto:info@superdb.cc">info@superdb.cc</a>
            </span>
        </div>

        </div> <!-- end container -->
    </div>
    @endsection
