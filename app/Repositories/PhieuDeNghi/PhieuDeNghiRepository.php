<?php

namespace App\Repositories\PhieuDeNghi;

use Carbon\Carbon;
use App\Models\PhieuDeNghi;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class PhieuDeNghiRepository extends BaseRepository implements PhieuDeNghiInterface
{
    public function getModel()
    {
        return PhieuDeNghi::class;
    }

    public function getIDPhieuMua()
    {
        $now = Carbon::now();
        $code = 'PM';
        $month = $now->format('m');
        $year = $now->format('y');
        $prefix = $code . $month . $year;
        $last_field = $this->model->where('ID', 'like', "$prefix%")->orderby('ID', 'desc')->first();
        if (!$last_field) {
            $count = str_pad(1, 4, '0', STR_PAD_LEFT);
        } else {
            $count = intval(substr($last_field->ID, -4)) + 1;
            $count = str_pad($count, 4, '0', STR_PAD_LEFT);
        }
        $new_id = $prefix . $count;
        return $new_id;
    }

    public function listAll()
    {
        return $this->model->select()->orderby('TrangThai', 'asc')->orderby('NgayLapPhieu', 'asc')->paginate($this->limit);
    }

    public function myListPhieuMua()
    {
        return $this->model->select()->where('ID_NguoiDN', Auth::user()->ID)
            ->orderby('TrangThai', 'asc')->orderby('NgayLapPhieu', 'asc')->paginate($this->limit);
    }
    public function confirmHoanThanh($id_PhieuDN)
    {
        $this->update($id_PhieuDN,['NgayHoanThanh'=>Carbon::now('Asia/Ho_Chi_Minh'),'TrangThai' => 3]);
    }
}
