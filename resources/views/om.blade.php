@extends('layouts.app')

@section('title', 'Om superdb.cc')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Om SuperDB.cc
        </h2>
        <div>
            Denna sida är till för att ge en överblick över de spel som framförallt Bergsala har släppt i Sverige. Sidan är skapad eftersom att det inte finns en för alla tillgänglig databas över dessa speltitlar.
        </div>

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Data</h2>
        <div>
            Datan är insamlad under en lång tidshorisont i en mängd olika format. Ha som utgångspunkt att datan som presenteras <i>kan</i> vara direkt felaktig.
        </div>
        <div>
            Förhoppningsvis kommer SuperDB att ge redigeringsmöjligheter av databasen till användare i framtiden.
        </div>
        <div>
            <ul>
                <li>Nintendo Entertainment System, 223 titlar</li>
                <li>Super Nintendo Entertainment System, 247 titlar</li>
                <li>Nintendo 64, 213 titlar</li>
                <li>Nintendo Gamecube, 445 titlar</li>
                <li>Game Boy Advance, 718 titlar</li>
                <li>Game Boy Color, 186 titlar</li>
            </ul>
        </div>

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Hjälp till</h2>
        <div>
            Har du idéer på förbättringar eller vill hjälpa till i projektet? Hör av dig via mejl.
        </div>
        <div>
            Projektet är byggt med <a class="underline" href="https://laravel.com/">Laravel</a>, <a class="underline" href="https://teenyicons.com/">Tinyicons</a> och <a class="underline" href="https://tailwindcss.com/">Tailwind CSS</a>. Projektet körs på nginx hos <a class="underline" href="https://www.digitalocean.com/">Digitalocean</a> på en ubuntu droplet.
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
