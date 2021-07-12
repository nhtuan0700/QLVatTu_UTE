<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuDeNghi extends Model
{
    public const PHIEUMUA = 1;
    public const PHIEUSUA = 2;

    protected $fillable = [
        'ID_NguoiDeNghi', 'ID_NVCSVC', 'LoaiPhieu',
        'NgayLapPhieu', 'NgayDuKien', 'NgayHoanThanh',
        'TrangThai', 'GhiChu'
    ];

    protected $table = 'PhieuDenghi';

    protected $primaryKey = 'ID';
    public $incrementing = false;

    const CREATED_AT = 'NgayLapPhieu';

    public function nguoiDeNghi()
    {
        return $this->belongsTo(NguoiDung::class, 'ID_NguoiDeNghi', 'ID');
    }

    public function nguoiXetDuyet()
    {
        return $this->belongsTo(NguoiDung::class, 'ID_NVCSVC', 'ID');
    }

    public function chiTietMua()
    {
        return $this->hasMany(ChiTietMua::class, 'ID_Phieu', 'ID');
    }

    public function chiTietSua()
    {
        return $this->hasMany(ChiTietMua::class, 'ID_Phieu', 'ID');
    }

    public function danhSachBanGiao()
    {
        return $this->hasMany(PhieuBanGiao::class, 'ID_PhieuDN', 'ID');
    }
}
