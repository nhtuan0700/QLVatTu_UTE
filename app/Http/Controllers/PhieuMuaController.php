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
        return view('phieudenghi.mua.index');
    }

    public function showFormCreate()
    {
        return view('phieudenghi.mua.create');
    }
    
    public function create(CreatePhieuMua $request)
    {

    }

    public function detail($id)
    {
        return view('phieudenghi.mua.detail');
    }

    public function update($id)
    {

    }
    
    public function delete($id)
    {
        
    }

    public function confirm()
    {

    }
}
