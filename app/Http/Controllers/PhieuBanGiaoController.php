<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhieuBanGiao\CreatePhieuBanGiao;
use App\Repositories\PhieuBanGiao\PhieuBanGiaoInterface;
use Illuminate\Http\Request;

class PhieuBanGiaoController extends Controller
{
    protected $phieuBanGiaoRepo;

    public function __construct(PhieuBanGiaoInterface $phieuBanGiaoInterface)
    {
        $this->phieuBanGiaoRepo = $phieuBanGiaoInterface;
    }

    public function index()
    {
        return view('phieubangiao.index');
    }

    public function showCreateform()
    {
        return view('phieubangiao.create');
    }

    public function create(CreatePhieuBanGiao $request)
    {

    }

    public function detail($id)
    {
        return view('phieubangiao.detail');
    }
}
