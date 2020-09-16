<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Siswa;

class ImportExcel implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);

        foreach ($collection as $key => $row) {

            if ($key >= 3) {
                Siswa::create([
                    'user_id' => 100,
                    'nama_depan' => $row[1],
                    'nama_belakang' => ' ',
                    'jenis_kelamin' => $row[2],
                    'agama' => $row[3],
                    'alamat' => $row[4],

                ]);
            }
        }
    }
}
