@extends('layouts.master')

    @section('content')

    <div class="main">
            <div class="main-content">
                <div class="container-fluid">

                    @if(session('sukses'))
                        <div class="alert alert-success mt-1" role="alert">
                            {{session('sukses')}}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit data siswa</h3>
                                </div>
                                <div class="panel-body">
                                        <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                                <div class="form-group">
                                                    <label for="namaDepan">Nama depan</label>
                                                    <input type="text" class="form-control" id="namaDepan" name="nama_depan" value="{{$siswa->nama_depan}}" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="namaBelakang">Nama belakang</label>
                                                    <input type="text" class="form-control" id="namaBelakang" name="nama_belakang" value="{{$siswa->nama_belakang}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="jenisKelamin">Jenis kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin" id="jenisKelamin">
                                                        <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                                        <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="agama">Agama</label>
                                                    <input type="text" class="form-control" name="agama" id="agama" value="{{$siswa->agama}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea class="form-control" name="alamat" id="alamat" rows="2">{{$siswa->alamat}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                        <label class="form-control" for="gambar">Foto</label>
                                                        <input type="file" class="form-control" name="gambar" id="gambar" value="{{$siswa->gambar}}">
                                                </div>

                                                <button type="submit" class="btn btn-warning">Update</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @stop

{{-- {{dd($data_siswa)}} --}}

