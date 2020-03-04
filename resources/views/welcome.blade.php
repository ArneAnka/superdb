@extends('layouts.app')

@section('content')
    <h1>superdb.cc 🍻</h1>
    <h3>Databas över Nintendo titlar till NES, SNES, N64, GC, GBA och GBC</h3>
   
    <div class="toast toast-primary">
    (Observera att databasen gör ett försök till att enbart innehålla titlar utgivna i Norden.
    Dessvärre är N64, GC, GBA och GBC inte långt gågna i den processen.)
    </div>

    <ul>
        <li>NES, {{ $nes_count }} titlar</li>
        <li>SNES, {{ $snes_count }} titlar</li>
        <li>N64, {{ $n64_count }} titlar</li>
        <li>GC, {{ $ngc_count }} titlar</li>
        <li>GBA, {{ $gba_count }} titlar</li>
        <li>GBC, {{ $gbc_count }} titlar</li>
    </ul>
    
    <p>
    Antal rader: 2010 <br>
    Genomsnittlig radlängd: ~199 <br>
    Dumpad databasstorlek: ~6,2M <br>
    </p>

    <p>
    <a href="mailto:info@superdb.cc">info@superdb.cc</a>
    </p>
@endsection
