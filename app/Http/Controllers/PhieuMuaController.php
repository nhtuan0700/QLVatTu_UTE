<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PhieuMua\CreatePhieuMua;
use App\Repositories\PhieuDeNghi\PhieuDeNghiInterface;

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
        if (Gate::denies('phieudenghi-detailPolicy', $phieu)) {
            return redirect(route('index'))->with('alert-fail', 'Không thể truy cập');
        };
        return view('phieudenghi.mua.detail', compact('phieu'));
    }

    public function showEdit($id)
    {
        $phieu = $this->phieuMuaRepo->findOrFail($id);
        if (Gate::denies('phieudenghi-editPolicy', $phieu)) {
            return redirect(route('index'))->with('alert-fail', 'Không thể truy cập');
        };
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
        $phieu = $this->phieuMuaRepo->findOrFail($id);
        if (Gate::denies('phieudenghi-hoanThanhPolicy', $phieu)) {
            return redirect(route('index'))->with('alert-fail', 'Không thể truy cập');
        };
        $this->phieuMuaRepo->hoanThanhPhieuMua($id);
        return back()->with('alert-success', 'Xác nhận hoàn thành phiếu đề nghị thành công');
    }
}
