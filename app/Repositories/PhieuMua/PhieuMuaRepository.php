<?php

namespace App\Repositories\PhieuMua;

use Carbon\Carbon;
use App\Models\PhieuDeNghi;
use App\Repositories\BaseRepository;

class PhieuMuaRepository extends BaseRepository implements PhieuMuaInterface
{
    public function getModel()
    {
        return PhieuDeNghi::class;
    }

    public function getID()
    {
        $now = Carbon::now();
        $prefix = 'PM';
        $month = $now->format('m');
        $year = $now->format('y');
        
        $id = $prefix . $month . $year;
        dd($id);
    }
}
