<table border="1" cellpadding="7" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Rata-Rata Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $s)
        <tr>
            <td>{{$s->namaLengkap()}}</td>
            <td>{{$s->jenis_kelamin}}</td>
            <td>{{$s->agama}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->nilaiRataRata()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
