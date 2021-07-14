<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhieuMua\CreatePhieuMua;
use App\Repositories\PhieuDeNghi\PhieuDeNghiInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhieuMuaController extends Controller
{
    protected $phieuMuaRepo;

    public function __construct(PhieuDeNghiInterface $phieuDeNghiInterface)
    {
        $this->phieuMuaRepo = $phieuDeNghiInterface;
    }

    public function index()
    {
        // dd($this->phieuMuaRepo->myListPhieuMua());
        $data = $this->phieuMuaRepo->myListPhieuMua();
        return view('phieudenghi.mua.index', compact('data'));
    }

    public function showCreate()
    {
        return view('phieudenghi.mua.create');
    }

    public function create(Request $request)
    {
        $data = $this->phieuMuaRepo->themPhieuMua($request->input('data'));
        return response()->json($data);
    }

    public function detail($id)
    {
        $phieu = $this->phieuMuaRepo->findOrFail($id);
        return view('phieudenghi.mua.detail', compact('phieu'));
    }

    public function showEdit($id)
    {
        $phieu = $this->phieuMuaRepo->findOrFail($id);
        return view('phieudenghi.mua.edit')->with(compact('phieu'))
            ->with(compact('id'));
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
        $stt = $this->phieuMuaRepo->xoaPhieuMua($id);
        return back();
    }
    public function xoaCTMua(Request $request)
    {
        $xoa = $this->phieuMuaRepo->xoaChiTietMua($request->input('idPhieu'), $request->input('idVatTu'));
        return response()->json($xoa);
    }
    public function themCTMua(Request $request)
    {
        $them=$this->phieuMuaRepo->themChiTietMua($request->input('data'));
        return response()->json($them);
    }
    public function confirm()
    {
    }
}
