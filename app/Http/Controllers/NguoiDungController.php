<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use App\Repositories\NguoiDung\NguoiDungInterface;

class NguoiDungController extends Controller
{
    protected $nguoiDungRepo;

    public function __construct(NguoiDungInterface $nguoiDungInterface)
    {
        $this->nguoiDungRepo = $nguoiDungInterface;   
    }
    public function index()
    {
        $data = $this->nguoiDungRepo->list();
        return view('nguoidung.index', compact('data'));
    }

    public function profile()
    {
        return view('nguoidung.profile');
    }
}
