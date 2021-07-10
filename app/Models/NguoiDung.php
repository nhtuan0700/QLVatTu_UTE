<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Model
{
    use Notifiable;

    public const ADMIN = 1;
    public const CSVC = 2;
    public const QLVT = 3;
    public const GV = 4;

    protected $fillable = [
        'HoTen', 'NgaySinh', 'CMND', 'SDT', 'Email', 'TaiKhoan', 'MatKhau', 'LoaiTaiKhoan'
    ];

    protected $table = 'NguoiDung';

    protected $primaryKey = 'ID';

    public function danhSachDeNghi()
    {
        return $this->hasMany(PhieuDeNghi::class, 'ID_NguoiDeNghi', 'ID');
    }

    public function khoaPB()
    {
        return $this->belongsTo(KhoaPhongBan::class, 'ID_KhoaPB', 'ID');
    }
}
