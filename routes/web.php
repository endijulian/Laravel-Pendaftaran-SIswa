<?php

// use Illuminate\Routing\Route;

// use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Symfony\Component\Routing\Route;

// Route::get('kirimEmail', function () {
//     \Mail::raw('Hallo guyss', function ($message) {
//         // $message->from('john@johndoe.com', 'John Doe');
//         // $message->sender('john@johndoe.com', 'John Doe');
//         $message->to('endi@gmail.com', 'Halo guys im endi');
//         // $message->cc('john@johndoe.com', 'John Doe');
//         // $message->bcc('john@johndoe.com', 'John Doe');
//         // $message->replyTo('john@johndoe.com', 'John Doe');
//         $message->subject('Pendaftaran Siswa');
//         // $message->priority(3);
//         // $message->attach('pathToFile');
//     });
// });

Route::get('/', 'SiteController@home');
Route::get('register', 'SiteController@register');
Route::post('/postRegister', 'SiteController@postRegister');


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'CekRole:admin']], function () {
    // Route::get('/dashbord', 'DashboardController@index'); //->middleware('auth'); bisa juga seperti ini
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/tambahSiswa', 'SiswaController@tambahSiswa');
    Route::get('/siswa/{siswa}/edit', 'SiswaController@edit');
    Route::post('/siswa/{siswa}/update', 'SiswaController@update');
    Route::get('/siswa/{siswa}/hapus', 'SiswaController@hapus');
    Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
    Route::post('/siswa/{id}/tambahNilai', 'SiswaController@tambahNilai');
    Route::get('/siswa/{id}/{idMapel}/hapusNilai', 'SiswaController@hapusNilai');
    Route::get('/siswa/exportExcel', 'SiswaController@exportExcel');
    Route::get('/siswa/exportPDF', 'SiswaController@exportPDF');
    Route::post('/siswa/import', 'SiswaController@importExcel')->name('siswa.import');

    Route::get('/guru/{id}/profile', 'GuruController@profile');

    Route::get('/posts', 'PostsController@index')->name('posts.index');
    // Route::get('/posts', 'PostsController@add');

    Route::get(
        'posts/add',
        [
            'uses' => 'PostsController@add',
            'as' => 'posts.add'
        ]
    );

    Route::get(
        'posts/hapus{id}',
        [
            'uses' => 'PostsController@hapus',
            'as' => 'posts.hapus'
        ]
    );

    Route::post(
        'posts/create',
        [
            'uses' => 'PostsController@create',
            'as' => 'posts.create'
        ]
    );
});

Route::group(['middleware' => ['auth', 'CekRole:admin,siswa']], function () {
    Route::get('/dashbord', 'DashboardController@index');
});

Route::group(['middleware' => ['auth', 'CekRole:siswa']], function () {
    Route::get('profileSiswa', 'SiswaController@profileSiswa');
});

Route::get(
    'getdataSiswa',
    [
        'uses' => 'SiswaController@getdataSiswa',
        'as' => 'ajax.get.data.siswa'
    ]
);

Route::get(
    '/{slug}',
    [
        'uses' => 'SiteController@singlePost',
        'as' => 'site.single.post'
    ]
);
