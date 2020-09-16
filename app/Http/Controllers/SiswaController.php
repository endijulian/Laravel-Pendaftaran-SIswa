<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;


use App\Exports\SiswaExport;
use App\Imports\ImportExcel;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

use \App\Siswa;
use Yajra\DataTables\Contracts\DataTable;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->paginate(20); //->get();
        } else {
            $data_siswa = \App\Siswa::all(); //\App\Siswa::all();
        }
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function tambahSiswa(Request $request)
    {
        //insert/memasukan ke table siswa
        // $siswa = \App\Siswa::create($request->all());
        // dd($request->all());
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'gambar' => 'mimes:jpg,png'
        ]);

        //insert ke table Users
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('julian');
        $user->remember_token = str_random(60);
        $user->save();

        //insert/memasukan ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/', $request->file('gambar')->getClientOriginalName());
            $siswa->gambar = $request->file('gambar')->getClientOriginalName();
            $siswa->save();
        }

        return Redirect('/siswa')->with('sukses', 'Data siswa berhasil ditambah');
    }

    public function edit(Siswa $siswa)
    {
        // $siswa = Siswa::find($id); diganti ke method baris 66
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        // dd($request->all());
        // $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/', $request->file('gambar')->getClientOriginalName());
            $siswa->gambar = $request->file('gambar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data siswa berhasil di ubah');
    }

    public function hapus(Siswa $siswa)
    {
        // $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data siswa berhasil dihapus');
    }

    public function profile(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($siswa); Diganti dengan method dibaris 92
        $mataPelajaran = \App\Mapel::all();
        // dd($mapel);

        //Menyiapkan data untuk chart
        $catagories = [];
        $data = [];
        foreach ($mataPelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $catagories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }
        // dd(json_encode($catagories));
        // dd($data);

        return view('siswa/profile', ['siswa' => $siswa, 'mataPelajaran' => $mataPelajaran, 'catagories' => $catagories, 'data' => $data]);
    }

    public function tambahNilai(Request $request, $id)
    {
        // dd($request->all());
        $siswa = Siswa::find($id);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/' . $id . '/profile')->with('error', 'Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/' . $id . '/profile')->with('sukses', 'Nilai berhasil di masukan');
    }

    public function hapusNilai($idsiswa, $idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);

        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPDF()
    {
        //Export PDF load HTML
        // $pdf = PDF::loadHTML('<h1>Test</h1>');
        // return $pdf->download('siswa.pdf');


        //Export PDF Load View
        $siswa = Siswa::all();
        $pdf = PDF::loadView('exportPDF.siswaExportPdf', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function getdataSiswa()
    {
        $siswa = Siswa::select('siswa.*');  //Siswa::all();
        return \DataTables::eloquent($siswa)
            ->addColumn('namaLengkap', function ($s) {
                return $s->nama_depan . ' ' . $s->nama_belakang;
            })
            ->addColumn('rataNilai', function ($s) {
                return $s->nilaiRataRata();
            })
            ->addColumn('aksi', function ($s) {
                return '<a href="/siswa/' . $s->id . '/profile/" class="btn btn-warning" >Profile</a>';
            })
            ->rawColumns(['namaLengkap', 'rataNilai', 'aksi'])
            ->toJson();
    }

    public function profileSiswa()
    {
        // $siswa = auth()->user()->siswa;
        return view('siswa.profileSiswa');
        //return view('siswa.profileSiswa', compact(['siswa']));
    }

    public function importExcel(Request $request)
    {
        // dd($request)->all();

        Excel::import(new \App\Imports\ImportExcel, $request->file('data_siswa'));

        return redirect('/siswa')->with('sukses', 'Data berhasil import');
    }
}
