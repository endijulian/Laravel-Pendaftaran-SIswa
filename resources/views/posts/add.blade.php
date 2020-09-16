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
                                        <h3 class="panel-title">Tambah post baru</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form action="{{route('posts.create')}}" method="POST"                 enctype="multipart/form-data">
                                                    {{ csrf_field() }}

                                                    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukan title" value="{{old('title')}}">

                                                        @if($errors->has('title'))
                                                            <span class="help-block">{{$errors->first('title')}}</span>
                                                        @endif
                                                    </div>

                                                <div class="form-group {{$errors->has('content') ? 'has-error' : ''}}">
                                                    <label for="content">Content</label>
                                                    <textarea class="form-control" name="content" id="CkEditor" rows="2">{{old('content')}} </textarea>

                                                    @if($errors->has('content'))
                                                        <span class="help-block">{{$errors->first('content')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4" >
                                                    <label for="thumbnail">Thumbnail</label>
                                                <div class="input-group {{$errors->has('content') ? 'has-error' : ''}}">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" type="text" name="thumbnail">


                                                </div>
                                                @if($errors->has('thumbnail'))
                                                        <span class="help-block" style="color:red;">{{$errors->first('thumbnail')}}</span>
                                                    @endif
                                                <img id="holder" style="margin-top:15px;max-height:100px;">

                                                <div class="input-group">
                                                    <input class="btn btn-primary" type="submit" value="Simpan">
                                                </div>

                                            </div>
                                        </div>
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

@section('footer')
    <script>
        ClassicEditor
            .create( document.querySelector( '#CkEditor' ) )
            .catch( error => {
                console.error( error );
            } );

            $(document).ready(function(){
                $('#lfm').filemanager('image');
            });

    </script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
@endsection

