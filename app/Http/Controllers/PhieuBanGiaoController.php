<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PhieuBanGiao\CreatePhieuBanGiao;
use App\Repositories\PhieuBanGiao\PhieuBanGiaoInterface;

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
        if (Gate::denies('phieubangiao-detailPolicy', $phieu)) {
            return redirect(route('index'))->with('alert-fail', 'Không thể truy cập');
        };
        return view('phieubangiao.detail', compact('phieu'));
    }

    public function xacNhan($id_phieuBG)
    {
        $phieu = $this->phieuBanGiaoRepo->findOrFail($id_phieuBG);
        if (Gate::denies('phieubangiao-xacNhanPolicy', $phieu)) {
            return redirect(route('index'))->with('alert-fail', 'Không thể truy cập');
        };
        $this->phieuBanGiaoRepo->xacNhan($id_phieuBG);
        return back()->with('alert-success','Xác nhận phiếu bàn giao thành công');
    }
    public function createChiTietPhieuBG(Request $request)
    {
        $them=$this->phieuBanGiaoRepo->themChiTietBG($request->input('data'));
        return response()->json($them);
    }
}
