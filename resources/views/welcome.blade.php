@extends('layouts.app')

@section('title', 'välkommen')

@section('content')
<h1>superdb.cc 🍻</h1>
<h3>Databas över Nintendo titlar till NES, SNES, N64, GC, GBA och GBC</h3>

<div class="toast toast-primary">
    (Observera att databasen gör ett försök till att enbart innehålla titlar utgivna i Norden.
    Dessvärre är N64, GC, GBA och GBC inte långt gågna i den processen.)
</div>

<ul>
    <li>
        <a href="{{ route('nes') }}">NES</a>, {{ $nes_count }} titlar
    </li>
    <li>
        <a href="{{ route('snes') }}">SNES</a>, {{ $snes_count }} titlar
    </li>
    <li>
        <a href="{{ route('n64') }}">N64</a>, {{ $n64_count }} titlar
    </li>
    <li>
        <a href="{{ route('ngc') }}">NGC</a>, {{ $ngc_count }} titlar
    </li>
    <li>
        <a href="{{ route('gba') }}">GBA</a>, {{ $gba_count }} titlar
    </li>
    <li>
        <a href="{{ route('gbc') }}">GBC</a>, {{ $gbc_count }} titlar
    </li>
</ul>

<p>
    Antal rader: 2010 <br>
    Genomsnittlig radlängd: ~199 <br>
    Dumpad databasstorlek: ~6,2M <br>
</p>

<h2><u>De 10 senaste ändringarna i speldatabasen</u></h2>
@forelse($games_history as $game)
    <a href="{{ route('game.show', $game) }}">{{ $game->title }}</a> ({{ $game->updated_at->diffForHumans() }})<br>
@empty
@endforelse

<h2><u>Uppdateringar</u></h2>
<div>
    <p style="margin-bottom: 0px"><b>Tis  5 Maj 2020 10:21:40</b></p>
    <p style="margin-top: 0px;">Mer information om andra spel visas nu när du visar ett specefikt spel. Enklare navigering på sidor där alla spel visas. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b>Ons 25 Mar 2020 06:01:32</b></p>
    <p style="margin-top: 0px;">Ändringshistorik tillagd //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b>Mån 23 Mar 2020 06:04:26</b></p>
    <p style="margin-top: 0px;">Arbetar just nu med att alla SNES-spel skall få en "beskrivnig" (description). Tar tid! //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b>Ons 11 Mar 2020 06:09:49</b></p>
    <p style="margin-top: 0px;">Inne i en uppdateringsperiod just nu! Det senaste är små kosmetiska ändringar. Dessvärre får jag inte till det med navigationsmenyn när sidan visas på mindre skärmar, exempelvis smartphones. Den flyttas från vänster sida och lägger sig i nederkant. Men det går att navigera trots de felen.</p>
    <p>Jag håller också på med att "koppla samman" spel mellan olika konsoler. Kan vara intressant att se om samma spel, eller i varje fall titel, finns på någon annan konsol. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b>Lör 7 Mar 2020 11:31:44</b></p>
    <p style="margin-top: 0px;">Efter mycket mödosamt arbete så börjar databasen ta form! Det stora arbetet som har varit är datum, att ändra datumen till ISO 8601 med manuell handpåläggning men också automatsikt med divere pythonskript. Det arbete som fortskrider kontinuerligt är bland annat att lägga in releaser, uppdatera utgivare, genre och modes. Ja, ni fattar.</p>
    <p>Är du också entusiast? Maila mig! //JNI</p>
</div>
<hr>

<p>
    <a href="mailto:info@superdb.cc">info@superdb.cc</a>
</p>
@endsection
