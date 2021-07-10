<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuBanGiao extends Model
{
    protected $fillable = [
        'ID_PhieuDN', 'ID_NVCSVC', 'ID_NguoiXN', 'LyDo', 'NgayBanGiao'
    ];

    protected $table = 'ChiTietSua';

    protected $primaryKey = 'ID';

    const UPDATED_AT = 'NgayBanGiao';

    public function chiTietBanGiao()
    {
        return $this->hasMany(ChiTietBanGiao::class, 'ID_Phieu', 'ID');
    }

    public function nguoiLapPhieu()
    {
        return $this->belongsTo(NguoiDung::class, 'ID_NVCSVC', 'ID');
    }

    public function nguoiXacNhan()
    {
        return $this->belongsTo(NguoiDung::class, 'ID_NguoiXN', 'ID');
    }
}
