<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HanMuc extends Model
{
    protected $fillable = [
        'ID_KhoaPB', 'ID_VPP', 'HanMucDaSuDung', 'HanMucToiDa', 'NgayBatDau'
    ];

    protected $table = 'HanMuc';
}
