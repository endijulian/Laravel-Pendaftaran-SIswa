<?php

namespace App\Http\Controllers;

use App\Mail\NotifEmailPendaftaranSiswa;
use Illuminate\Http\Request;
use App\Post;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return view('sites.home', compact(['posts']));
    }

    public function about()
    {
        return view('sites.about');
    }

    public function register()
    {
        return view('sites.register');
    }

    public function postRegister(Request $request)
    {
        //insert pendaftar jadi user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());

        //mengirim notifikasi email ke user pendaftaran
        // \Mail::raw('Selamat datang ' . $user->name, function ($message) use ($user) {
        //     // $message->from('john@johndoe.com', 'John Doe');
        //     // $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to($user->email, $user->name);
        //     // $message->cc('john@johndoe.com', 'John Doe');
        //     // $message->bcc('john@johndoe.com', 'John Doe');
        //     // $message->replyTo('john@johndoe.com', 'John Doe');
        //     $message->subject('Selamat Anda Sudah Terdaftar di Sekolah Kami');
        //     // $message->priority(3);
        //     // $message->attach('pathToFile');
        // });

        \Mail::to($user->email)->send(new NotifEmailPendaftaranSiswa);

        return redirect('/')->with('sukses', 'Pendaftaran Berhasil !!');
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('sites.singlePost', ['post' => $post]);
    }
}
