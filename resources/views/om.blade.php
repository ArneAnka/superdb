@extends('layouts.app')

@section('title', 'Om superdb.cc')

@section('content')
<div>
    <h1>Om SuperDB.cc 🥳</h1>
    <p>Denna sida är till för att ge en överblick över de spel som framförallt Bergsala har släppt i Sverige. Sidan är skapad eftersom att det inte finns en för alla tillgänglig databas över dessa speltitlar.</p>

    <h1>Data</h1>
    <p>Datan är insamlad under en lång tidshorisont i en mängd olika format. Ha som utgångspunkt att datan som presenteras <i>kan</i> vara direkt felaktig.</p>
    <p>Förhoppningsvis kommer SuperDB att ge redigeringsmöjligheter av databasen till användare i framtiden.</p>

    <h1>Hjälp till</h1>
    <p>Har du idéer på förbättringar eller vill hjälpa till i projektet? Hör av dig via mejl.</p>
    <p>Projektet är byggt med Laravel 7, körs på nginx på en digitalocean ubuntu droplet. Projektet använder givetvis git.</p>
</div>

<p>
    <a href="mailto:info@superdb.cc">info@superdb.cc</a>
</p>
@endsection
