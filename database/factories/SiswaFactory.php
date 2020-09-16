<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(\App\Siswa::class, function (Faker $faker) {
    return [
        'user_id' => 100,
        'nama_depan' => $faker->name,
        'nama_belakang' => ' ',
        'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        'agama' => $faker->randomElement(['Islam', 'Hindu', 'Budha', 'Katholik', 'Krisen']),
        'alamat' => $faker->address

    ];
});
