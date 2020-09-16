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
                                    <div class="panel-heading">
                                            <h3>POST</h3>
                                        <div class="right">
                                            <a href="{{route('posts.add')}}" class="btn btn-sm btn-primary"> Tambah Post </a>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TITLE</th>
                                                <th>USER</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)

                                            <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->user->name}}</td>
                                                <td>
                                                    <a target="_blank" href="{{route('site.single.post', $post->slug)}}" class="btn btn-success btn-sm">View</a>

                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>

                                                    <a href="{{route('posts.hapus', $post->id)}}" class="btn btn-danger btn-sm" onclick="return confirm ('Yakin akan di hapus')">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END BORDERED TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop

{{-- {{dd($data_siswa)}} --}}

