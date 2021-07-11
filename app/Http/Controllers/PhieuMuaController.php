<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhieuMua\CreatePhieuMua;
use Illuminate\Http\Request;
use App\Repositories\PhieuMua\PhieuMuaInterface;

class PhieuMuaController extends Controller
{
    protected $phieuMuaRepo;

    public function __construct(PhieuMuaInterface $phieuMuaInterface)
    {
        $this->phieuMuaRepo = $phieuMuaInterface;
    }
    
    public function index()
    {
        // dd($this->phieuMuaRepo);
        dd($this->phieuMuaRepo->getID());
    }
    
    public function create(CreatePhieuMua $request)
    {

    }

    public function detail($id)
    {

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
