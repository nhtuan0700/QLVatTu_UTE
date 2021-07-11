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

    }

    public function create(CreatePhieuBanGiao $request)
    {

    }

    public function detail($id)
    {

    }
}
