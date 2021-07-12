<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class NguoiDung extends Model implements AuthenticatableContract
{
    use Notifiable;
    use Authenticatable;
    public const ADMIN = 1;
    public const CSVC = 2;
    public const QLVT = 3;
    public const GV = 4;

    protected $fillable = [
        'HoTen', 'NgaySinh', 'CMND', 'SDT', 'Email', 'TaiKhoan', 'MatKhau', 'LoaiTaiKhoan'
    ];

    protected $hidden = [
        'MatKhau', 'remember_token',
    ];

    protected $table = 'NguoiDung';
    public $incrementing = false;

    protected $primaryKey = 'ID';

    public function danhSachDeNghi()
    {
        return $this->hasMany(PhieuDeNghi::class, 'ID_NguoiDeNghi', 'ID');
    }

    public function khoaPB()
    {
        return $this->belongsTo(KhoaPhongBan::class, 'ID_KhoaPB', 'ID');
    }

    public function getAuthPassword()
    {
        return $this->MatKhau;
    }
}
