<?php

namespace App\Http\Controllers;

use App\Siswa;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboards.index');
    }
}
