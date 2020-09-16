@extends('layouts.frontend')

@section('content')

<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Pendaftaran
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/register"> Pendaftaran </a></p>
                </div>
            </div>
        </div>
    </section>

<section class="search-course-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-4 col-md-6 search-course-left">
                <h1 class="text-white">
                    Pendaftran online<br>
                    Bergabung bersam kami !!
                </h1>
                <p>
                    Menjadikan siswa siswi yang unggul dan berkompeten!!
                </p>

            </div>
            <div class="col-lg-8 col-md-6 search-course-right section-gap">

                {!! Form::open(['url' => '/postRegister', 'class' => 'form-wrap']) !!}

                    <h4 class="text-white pb-20 text-center mb-30"> Form pendaftaran </h4>

                    {!! Form::text('nama_depan', '', ['class' => 'form-control', 'placeholder' => 'Nama depan']) !!}

                    {!! Form::text('nama_belakang', '', ['class' => 'form-control', 'placeholder' => 'Nama belakang']) !!}

                    {!! Form::text('agama', '', ['class' => 'form-control', 'placeholder' => 'Agama']) !!}

                    {!! Form::textarea('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}

                    <div class="form-select" id="service-select">
                        {!! Form::select('jenis_kelamin',['' => 'Pilih jenis kelamin','Laki-laki' => 'Laki-Laki', 'Laki-laki', 'Perempuan' => 'Perempuan']) !!}
                    </div>

                    {!! Form::email('email', '',['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) !!}

                    <input type="submit" class="primary-btn text-uppercase" value="Kirim">

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@endsection
