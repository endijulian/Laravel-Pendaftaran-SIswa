@extends('layouts.master')

    @section('content')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Rangking Siswa</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rangking</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $rangking = 1;
                                        @endphp
                                        @foreach ( rangkingSiswa() as $s)
                                            <tr>
                                                <td>{{$rangking}}</td>
                                                <td>{{$s->namaLengkap()}}</td>
                                                <td>{{$s->nilaiRataRata}}</td>
                                            </tr>
                                        @php
                                            $rangking++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{ totalSiswa() }}</span>
                                    <span class="title">Total Siswa</span>
                                </p>
                            </div>
                    </div>

                    <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{ totalGuru() }}</span>
                                    <span class="title">Total Guru</span>
                                </p>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @stop
