<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'agama',
        'alamat',
        'jenis_kelamin',
        'gambar',
        'user_id'
    ];

    public function getGambar()
    {
        if (!$this->gambar) {
            return asset('images/default.png');
        }

        return asset('images/' . $this->gambar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimestamps();
    }

    public function nilaiRataRata()
    {
        //ambil nilai
        if ($this->mapel->isNotEmpty()) {

            $total = 0;
            $hitung = 0;
            foreach ($this->mapel as $mapel) {
                $total = $total + $mapel->pivot->nilai;
                $hitung++;
            }
            return round($total / $hitung);
        }
        return 0;
    }

    public function namaLengkap()
    {
        return $this->nama_depan . ' ' . $this->nama_belakang;
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['gambar' => 'default.png']);
    }
}
