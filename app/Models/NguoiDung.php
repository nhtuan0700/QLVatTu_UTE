<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Helpers\Facade\FormatDate;

class NguoiDung extends Model implements AuthenticatableContract
{
    use Notifiable;
    use Authenticatable;
    public const ADMIN = 1;
    public const CSVC = 2;
    public const QLVT = 3;
    public const GV = 4;

    protected $fillable = [
        'HoTen', 'NgaySinh', 'CMND', 'SDT', 'Email', 'TaiKhoan', 'MatKhau', 'LoaiTK'
    ];

    protected $hidden = [
        'MatKhau', 'remember_token',
    ];

    protected $table = 'NguoiDung';
    public $incrementing = false;

    protected $primaryKey = 'ID';

    public function getNgaySinhAttribute($date)
    {
        return FormatDate::formatDate($date);
    }
    
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

    public function vaiTro()
    {
        switch ($this->LoaiTK) {
            case self::ADMIN:
                return 'Quản trị viên';
            case self::CSVC:
                return 'Nhân viên cơ sơ vật chất';
            case self::QLVT:
                return 'Nhân viên quản lý vật tư';
            default:
                return 'Giảng viên/Cán bộ';
                break;
        }
    }
}
