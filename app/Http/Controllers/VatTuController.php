<?php

namespace App\Http\Controllers;

use App\Repositories\VatTu\VatTuInterface;
use Illuminate\Http\Request;

class VatTuController extends Controller
{
    protected $vatTuRepo;
    public function __construct(VatTuInterface $vatTuInterface)
    {
        $this->vatTuRepo = $vatTuInterface;
    }

    public function index()
    {
        $data = $this->vatTuRepo->list();
        return view('vattu.index', compact('data'));
    }

    public function listVPP()
    {
    
    }

    public function listTB()
    {
    }
}
