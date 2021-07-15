<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhieuBanGiao\CreatePhieuBanGiao;
use App\Repositories\PhieuBanGiao\PhieuBanGiaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PhieuBanGiaoController extends Controller
{
    protected $phieuBanGiaoRepo;
    public function __construct(PhieuBanGiaoInterface $phieuBanGiaoInterface)
    {
        $this->phieuBanGiaoRepo = $phieuBanGiaoInterface;
    }

    public function index()
    {
        if (Auth::user()->LoaiTK == 2) {
            $data = $this->phieuBanGiaoRepo->list();
        } else {
            $data = $this->phieuBanGiaoRepo->myList();
        }
        return view('phieubangiao.index', compact('data'));
    }

    public function showCreateform()
    {
        return view('phieubangiao.create');
    }

    public function create(Request $request)
    {
        $data = $this->phieuBanGiaoRepo->themPhieuBanGiao($request);
        return response()->json($data);
    }

    public function detail($id)
    {
        $phieu = $this->phieuBanGiaoRepo->findOrFail($id);
        return view('phieubangiao.detail', compact('phieu'));
    }
    public function confirmPhieuBG($id_phieuBG)
    {
        $this->phieuBanGiaoRepo->confirmPhieuBG($id_phieuBG);
        return back()->with('alert-success','Xác nhận phiếu bàn giao thành công');
    }

    public function update(Request $request)
    {
        $data =$this->phieuBanGiaoRepo->suaPhieuBanGiao($request);
        return response()->json($data);
    }
    public function delete($id)
    {
        if ($this->phieuBanGiaoRepo->xoaPhieuBanGiao($id)) {
            return back()->with('alert-fail', 'Xóa thất bại');
        }
        return back()->with('alert-success', 'Xóa thành công');
    }
}
