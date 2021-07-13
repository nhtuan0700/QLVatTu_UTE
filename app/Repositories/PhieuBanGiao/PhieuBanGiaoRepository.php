<?php

namespace App\Repositories\PhieuBanGiao;

use App\Models\PhieuBanGiao;
use Carbon\Carbon;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class PhieuBanGiaoRepository extends BaseRepository implements PhieuBanGiaoInterface
{
    public function getModel()
    {
        return PhieuBanGiao::class;
    }

    public function getIDPhieuBG()
    {
        $now = Carbon::now();
        $code = 'BG';
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

    public function list()
    {
        $query = $this->model->select();
        return $query->orderby('ID_NguoiXN', 'asc')->orderby('NgayBanGiao', 'desc')->paginate($this->limit);
    }

    public function myList()
    {
        $query = PhieuBanGiao::join('PhieuDeNghi', 'PhieuDeNghi.ID', '=', 'PhieuBanGiao.ID_PhieuDN')
            ->where('PhieuDeNghi.ID_NguoiDN', '=', Auth::user()->ID)->select('PhieuBanGiao.*');
        return $query->orderby('ID_NguoiXN', 'asc')->orderby('NgayBanGiao', 'desc')->paginate($this->limit);
    }
}
