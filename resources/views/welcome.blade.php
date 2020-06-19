@extends('layouts.app')

@section('title', 'välkommen')

@section('content')
<h1>superdb.cc 🍻</h1>
<h3>Databas över Nintendo titlar till NES, SNES, N64, NGC, GBA och GBC</h3>

<div class="toast toast-primary">
    (Observera att databasen gör ett försök till att enbart innehålla titlar utgivna i Norden.
    Dessvärre är N64 och NES inte långt gången i den processen.)
</div>

<ul>
@foreach($games_count as $console)
<li>
    <a href="{{ route($console->short) }}">{{ $console->name }}</a>, {{ $console->games_count }} titlar
</li>
@endforeach
</ul>

<p>
    Antal rader: 2121 <br>
    Genomsnittlig radlängd: 2858 <br>
    Dumpad databasstorlek: 3,5M <br>
</p>

<h2><u>De 10 senaste ändringarna i speldatabasen</u></h2>
@forelse($games_history as $game)
    <a href="{{ route('game.show', $game) }}">{{ $game->title }}</a> ({{ $game->updated_at->diffForHumans() }})<br>
@empty
    Inga ändringar gjorda...
@endforelse

<h2><u>Uppdateringar</u></h2>
<div>
    <p style="margin-bottom: 0px"><b><u>Ons 17 Jun 2020 12:37:22</u></b></p>
    <p style="margin-top: 0px;">Uppdaterat GBC-avdelningen. 6 titlar raderade och 13 rader tillagda, även ändrat några felstavade titlar. Totala antalet spel på svenska marknaden är nu 186 st. Större delen importerade av Bergsala. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Tis 16 Jun 2020 13:41:52</u></b></p>
    <p style="margin-top: 0px;">Uppdaterat GBA-avdelningen. 21 titlar raderade och 30 rader tillagda. Totala antalet spel på svenska marknaden är nu 718 st. Större delen importerade av Bergsala. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Mån 15 Jun 2020 18:50:15</u></b></p>
    <p style="margin-top: 0px;">Uppdaterat NGC-avdelningen med att lägga till titlar utgivna av Bergsala och att ta bort spel ej utgivna på den svenska marknaden. Exempelvis så raderades 70 titlar ej utgivna i Sverige. Hittade till och med ett Xbox spel, Tom Clancy's Rainbow Six 3: Black Arrow. Nu återstår det extremt mödosamma arbetet att lägga till releaser till respektive title. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Lör 23 Maj 2020 14:16:42</u></b></p>
    <p style="margin-top: 0px;">Ändrat database layout. Lagt till `games_urls` tabell. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Tis  5 Maj 2020 10:21:40</u></b></p>
    <p style="margin-top: 0px;">Mer information om andra spel visas nu när du visar ett specefikt spel. Enklare navigering på sidor där alla spel visas. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Ons 25 Mar 2020 06:01:32</u></b></p>
    <p style="margin-top: 0px;">Ändringshistorik tillagd //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Mån 23 Mar 2020 06:04:26</u></b></p>
    <p style="margin-top: 0px;">Arbetar just nu med att alla SNES-spel skall få en "beskrivnig" (description). Tar tid! //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Ons 11 Mar 2020 06:09:49</u></b></p>
    <p style="margin-top: 0px;">Inne i en uppdateringsperiod just nu! Det senaste är små kosmetiska ändringar. Dessvärre får jag inte till det med navigationsmenyn när sidan visas på mindre skärmar, exempelvis smartphones. Den flyttas från vänster sida och lägger sig i nederkant. Men det går att navigera trots de felen.</p>
    <p>Jag håller också på med att "koppla samman" spel mellan olika konsoler. Kan vara intressant att se om samma spel, eller i varje fall titel, finns på någon annan konsol. //JNI</p>
<hr>
    <p style="margin-bottom: 0px"><b><u>Lör 7 Mar 2020 11:31:44</u></b></p>
    <p style="margin-top: 0px;">Efter mycket mödosamt arbete så börjar databasen ta form! Det stora arbetet som har varit är datum, att ändra datumen till ISO 8601 med manuell handpåläggning men också automatsikt med divere pythonskript. Det arbete som fortskrider kontinuerligt är bland annat att lägga in releaser, uppdatera utgivare, genre och modes. Ja, ni fattar.</p>
    <p>Är du också entusiast? Maila mig! //JNI</p>
</div>
<hr>

<p>
    <a href="mailto:info@superdb.cc">info@superdb.cc</a>
</p>
@endsection
