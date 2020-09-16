<?php

use App\Siswa;
use App\Guru;

function rangkingSiswa()
{
    $siswa = Siswa::all();
    $siswa->map(function ($s) {
        $s->nilaiRataRata = $s->nilaiRataRata();
        return $s;
    });
    $siswa = $siswa->sortByDesc('nilaiRataRata')->take(10); //->take(5); //cuma mengambil rangking 5 besar
    // dd($siswa);

    return $siswa;
}

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}
