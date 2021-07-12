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
        $data = $this->phieuDeNghiRepo->listAll();
        return view('phieudenghi.index', compact('data'));
    }

    public function detail($id)
    {
        $phieu = $this->phieuDeNghiRepo->findOrFail($id);
        if ($phieu->LoaiPhieu == 1) {
            return view('phieudenghi.mua.xetduyet', compact('phieu'));
        } else {
            return view('phieudenghi.sua.xetduyet', compact('phieu'));
        }
    }

    public function xetduyet()
    {
        
    }
}
