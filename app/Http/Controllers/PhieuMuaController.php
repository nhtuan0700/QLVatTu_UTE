<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhieuMua\CreatePhieuMua;
use App\Repositories\PhieuDeNghi\PhieuDeNghiInterface;
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

    public function create(CreatePhieuMua $request)
    {
    }

    public function detail($id)
    {
        $phieu = $this->phieuMuaRepo->findOrFail($id);
        return view('phieudenghi.mua.detail', compact('phieu'));
    }

    public function showEdit($id)
    {
        $phieu = $this->phieuMuaRepo->findOrFail($id);
        return view('phieudenghi.mua.edit', compact('phieu'));
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }

    public function hoanThanh($id)
    {
        $this->phieuMuaRepo->hoanThanhPhieuMua($id);
        return back()->with('alert-success', 'Xác nhận hoàn thành phiếu đề nghị thành công');
    }
}
