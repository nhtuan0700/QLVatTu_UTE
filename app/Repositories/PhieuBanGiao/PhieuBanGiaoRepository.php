<?php

namespace App\Repositories\PhieuBanGiao;

use App\Models\PhieuDeNghi;
use App\Repositories\BaseRepository;

class PhieuBanGiaoRepository extends BaseRepository implements PhieuBanGiaoInterface
{
    public function getModel()
    {
        return PhieuDeNghi::class;
    }
    
    public function getID()
    {
        
    }
}
