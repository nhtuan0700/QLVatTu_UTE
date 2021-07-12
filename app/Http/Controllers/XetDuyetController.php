<?php

namespace App\Http\Controllers;

use App\Repositories\PhieuDeNghi\PhieuDeNghiInterface;
use Illuminate\Http\Request;

class XetDuyetController extends Controller
{
    protected $phieuDeNghiRepo;

    public function __construct(PhieuDeNghiInterface $phieuDeNghiInterface)
    {
        $this->phieuDeNghiRepo = $phieuDeNghiInterface;
    }

    public function index()
    {
        return view('phieudenghi.index');
    }

    public function detail()
    {
        // Logic
        return view('phieudenghi.mua.xetduyet');
    }

    public function xetduyet()
    {
        
    }
}
