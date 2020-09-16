@extends('layouts.master')

    @section('content')
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            @if(session('sukses'))
                                <div class="alert alert-success mx-auto mt-1" role="alert">
                                    {{session('sukses')}}
                                </div>
                            @endif

                                <!-- BORDERED TABLE -->
                                <div class="panel">

                                    {{--  <form class="navbar-form navbar-right" method="GET" action="/siswa">
                                        <div class="input-group">
                                            <input type="text" name="cari" class="form-control" placeholder="Cari siswa">
                                            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
                                        </div>
                                    </form>  --}}

                                    <div class="panel-heading">
                                            <h3>Data Siswa</h3>

                                        <div class="right">

                                            <a href="" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                                                Import Excel
                                            </a>

                                            <a href="/siswa/exportPDF" class="btn btn-sm btn-primary"> Export PDF</a>

                                            <a href="/siswa/exportExcel" class="btn btn-sm btn-primary"> Export Excel</a>

                                            <button type="button"  data-toggle="modal" data-target="#exampleModal"><i class="btn btn-primary fa fa-user-plus" > Tambah data siswa</i></button>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Agama</th>
                                                    <th>Alamat</th>
                                                    <th>Nilai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            {{--  <tbody>
                                                @foreach ($data_siswa as $siswa)

                                                <tr>
                                                    <td>{{$siswa->nama_depan}}</td>
                                                    <td>{{$siswa->nama_belakang}}</td>
                                                    <td>{{$siswa->jenis_kelamin}}</td>
                                                    <td>{{$siswa->agama}}</td>
                                                    <td>{{$siswa->alamat}}</td>
                                                    <td>{{$siswa->nilaiRataRata()}}</td>
                                                    <td>
                                                        <a href="/siswa/{{$siswa->id}}/profile" class="btn btn-success btn-sm">Detail</a>

                                                        <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm"  onclick="return confirm('Yakin akan di edit?')">Edit</a>

                                                        <a href="/siswa/{{$siswa->id}}/hapus" class="btn btn-danger btn-sm " onclick="return confirm ('Yakin akan di hapus')">Hapus</a>

                                                    </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>  --}}
                                        </table>

                                        {{--  {{$data_siswa->links()}}  --}}

                                    </div>
                                </div>
                                <!-- END BORDERED TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal IMPORT EXCEL-->
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!!Form::open(['route' => 'siswa.import', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

                    {!!Form::file('data_siswa')!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" value="Import" class="btn btn-primary">
            </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal TAMBAH DATA SISWA-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/tambahSiswa" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
                        <label for="namaDepan">Nama depan</label>
                        <input type="text" class="form-control" id="namaDepan" name="nama_depan" placeholder="Masukan nama depan" value="{{old('nama_depan')}}">

                        @if($errors->has('nama_depan'))
                            <span class="help-block">{{$errors->first('nama_depan')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('nama_belakang') ? 'has-error' : ''}} ">
                        <label for="namaBelakang">Nama belakang</label>
                        <input type="text" class="form-control" id="namaBelakang" name="nama_belakang" placeholder="Masukan nama belakang" value="{{old('nama_belakang')}}">

                        @if($errors->has('nama_belakang'))
                            <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" value="{{old('email')}}">

                        @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                        <label for="jenisKelamin">Jenis kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenisKelamin">
                            <option value="Laki-laki" {{(old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{(old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                        </select>

                        @if($errors->has('jenis_kelamin'))
                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" name="agama" id="agama" placeholder="Masukan agama anda" value="{{old('agama')}}">

                        @if($errors->has('agama'))
                            <span class="help-block">{{$errors->first('agama')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="2">{{old('alamat')}} </textarea>

                        @if($errors->has('alamat'))
                            <span class="help-block">{{$errors->first('alamat')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('gambar') ? 'has-error' : ''}}">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="gambar">

                        @if($errors->has('gambar'))
                            <span class="help-block">{{$errors->first('gambar')}}</span>
                        @endif
                    </div>

            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        </div>

    @stop

{{-- {{dd($data_siswa)}} --}}

@section('footer')
        <script>
                $(document).ready(function(){
                    $('#dataTable').DataTable({
                        processing:true,
                        serverside:true,
                        ajax:"{{route('ajax.get.data.siswa')}}",
                        columns:[
                            {data:'namaLengkap', name:'namaLengkap'},
                            {data:'jenis_kelamin', name:'jenis_kelamin'},
                            {data:'agama', name:'agama'},
                            {data:'alamat', name:'alamat'},
                            {data:'rataNilai', name:'rataNilai'},
                            {data:'aksi', name: 'aksi'},
                        ]
                    });
                });
        </script>

@stop

