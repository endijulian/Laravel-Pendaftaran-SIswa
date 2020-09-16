@extends('layouts.master')

    @section('link')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    @stop

    @section('content')

    <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

                    @if(session('sukses'))
                        <div class="alert alert-success mt-1" role="alert">
                            {{session('sukses')}}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger mt-1" role="alert">
                            {{session('error')}}
                        </div>
                    @endif

					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img width="100" height="100" src="{{auth()->user()->siswa->getGambar()}}" style="width:50%;" class="img-circle" alt="Avatar">
										<h3 class="name">{{auth()->user()->siswa->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{auth()->user()->siswa->mapel->count()}} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
											{{auth()->user()->siswa->nilaiRataRata()}}<span> Rata-Rata Nilai </span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data diri siswa</h4><br>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{auth()->user()->siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{auth()->user()->siswa->agama}}</span></li>
											<li>Alamat <span>{{auth()->user()->siswa->alamat}}</span></li>
										</ul>
									</div>
									{{-- <div class="text-center"><a href="/siswa/{{auth()->user()->siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div> --}}
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Mata Pelajaran</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Semester</th>
                                                    <th>Nilai</th>
                                                    <th>Guru</th>
                                                    {{-- <th>Aksi</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach (auth()->user()->siswa->mapel as $mapel)
                                            <tr>
                                                <td>{{$mapel->kode}}</td>
                                                <td>{{$mapel->nama}}</td>
                                                <td>{{$mapel->semester}}</td>
                                                <td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{auth()->user()->siswa->id}}/editNilai" data-title = "Input Nilai"> {{$mapel->pivot->nilai}} </a></td>
                                                <td><a href="/guru/{{$mapel->guru_id}}/profile"> {{$mapel->guru->nama}} </a></td>
                                                {{-- <td>
                                                    <a href="/siswa/{{auth()->user()->siswa->id}}/{{$mapel->id}}/hapusNilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus?')" >Hapus</a>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- <div class="panel">
                                    <div id="chartNilai"></div>
                                </div> --}}
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
    </div>

    //{{auth()->user()->siswa->nama_depan}}

@stop


@section('footer')

@stop


