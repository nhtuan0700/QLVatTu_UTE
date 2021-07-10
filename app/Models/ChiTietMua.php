<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietMua extends Model
{
    protected $fillable = [
        'ID_Phieu', 'ID_VatTu', 'SoLuong', 'Gia'
    ];

    protected $table = 'ChiTietMua';

    public function vatTu()
    {
        return $this->belongsTo(VatTu::class, 'ID_VatTu', 'ID');
    }
}
