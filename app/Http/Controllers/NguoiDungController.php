<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function index()
    {
        return view('nguoidung.index');
    }

    public function profile()
    {
        return view('nguoidung.profile');
    }
}
