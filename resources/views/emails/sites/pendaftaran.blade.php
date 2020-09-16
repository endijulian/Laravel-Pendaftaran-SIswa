@component('mail::message')
# Pendaftaran Siswa

Selamat Anda Telah Terdaftar Di SMAN 1 PESISIR SELATAN.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
    Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
