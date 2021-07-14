<?php

namespace App\Repositories\PhieuDeNghi;

use Carbon\Carbon;
use App\Models\ChiTietMua;
use App\Models\PhieuDeNghi;
use Illuminate\Support\Facades\DB;
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

    public function xetDuyetMua($data, $id)
    {
        try {
            DB::beginTransaction();
            PhieuDeNghi::find($id)->update([
                'ID_NVCSVC' => Auth::user()->ID, 'NgayDuKien' => $data['NgayDuKien'],
                'TrangThai' => 2
            ]);
            foreach ($data['vattu'] as $item) {
                if (!is_numeric($item['Gia']) || intval($item['Gia']) <= 1000) {
                    throw new \Exception();
                }
                $chiTiet = ChiTietMua::where('ID_Phieu', '=', $id)->where('ID_VatTu', '=', $item['ID_VatTu']);
                $chiTiet->update(['Gia' => $item['Gia']]);
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return false;
        }
        DB::commit();
        return true;
    }
}
