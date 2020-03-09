@extends('layouts.app')

@section('content')
    <h1>superdb.cc 🍻</h1>
    <h3>Databas över Nintendo titlar till NES, SNES, N64, GC, GBA och GBC</h3>
   
    <div class="toast toast-primary">
    (Observera att databasen gör ett försök till att enbart innehålla titlar utgivna i Norden.
    Dessvärre är N64, GC, GBA och GBC inte långt gågna i den processen.)
    </div>

    <ul>
        <li><a href="{{ route('nes') }}">NES</a>, {{ $nes_count }} titlar</li>
        <li><a href="{{ route('snes') }}">SNES</a>, {{ $snes_count }} titlar</li>
        <li><a href="{{ route('n64') }}">N64</a>, {{ $n64_count }} titlar</li>
        <li><a href="{{ route('ngc') }}">NGC</a>, {{ $ngc_count }} titlar</li>
        <li><a href="{{ route('gba') }}">GBA</a>, {{ $gba_count }} titlar</li>
        <li><a href="{{ route('gbc') }}">GBC</a>, {{ $gbc_count }} titlar</li>
    </ul>
    
    <p>
    Antal rader: 2010 <br>
    Genomsnittlig radlängd: ~199 <br>
    Dumpad databasstorlek: ~6,2M <br>
    </p>
<hr>
<div>
    <p><b>2020-03-07- 11:31:44</b></p>
    <p>Efter mycket mödosamt arbete så börjar databasen ta form! Det stora arbetet som har varit är datum, att ändra datumen till ISO 8601 med manuell handpåläggning men också automatsikt med divere pythonskript. Det arbete som fortskrider kontinuerligt är bland annat att lägga in releaser, uppdatera utgivare, genre och modes. Ja, ni fattar.</p>
    <p>Är du också entusiast? Maila mig!</p>
</div>
<hr>

    <p>
    <a href="mailto:info@superdb.cc">info@superdb.cc</a>
    </p>
@endsection
