<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editNilai(Request $request, $id)
    {
        // return $request->all();

        $siswa = \App\Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
    }
}
