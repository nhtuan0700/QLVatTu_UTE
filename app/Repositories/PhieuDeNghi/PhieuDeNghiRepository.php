<?php

namespace App\Repositories\PhieuDeNghi;

use Carbon\Carbon;
use App\Models\PhieuDeNghi;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function themPhieuMua($data)
    {
        $dayNow = now()->format('m');
        $yearNow = substr(now()->format('Y'), 2, 2);
        $ngayLP = now()->format('Y-m-d H:i:s');

        $maxid = $this->model->select()->where('LoaiPhieu', '=', 1)
            ->where('ID_NguoiDN', '=', Auth::user()->ID)
            ->max('ID');

        $day = substr($maxid, 2, 4);
        $stt = substr($maxid, 6, 4);

        $stt = ($day == $dayNow . $yearNow) ? ($stt + 1) : 1;
        $newID = 'PM' . $dayNow . $yearNow . str_pad($stt, 4, "0", STR_PAD_LEFT);;

        $this->model->insert([
            'ID' => $newID,
            'LoaiPhieu' => 1,
            'NgayLapPhieu' => $ngayLP,
            'TrangThai' => 1,
            'ID_NguoiDN' => Auth::user()->ID
        ]);
        try {
            for($i=0;$i<count($data);$i++) {
                DB::table('chitietmua')->insert([
                    'ID_Phieu' => $newID,
                    'ID_VatTu' => $data[$i]['idTB'],
                    'SoLuong' => $data[$i]['soLuong'],
                ]);
            }
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function xoaPhieuMua($id)
    {
        try{
            DB::table('chitietmua')->where('ID_Phieu','=',$id)->delete();
            $this->model->where('ID','=',$id)->delete();
            return "Xóa thành công phiếu ".$id;
        }
        catch(Exception $e){
            return "Đã có lỗi xảy ra";
        }
    }
    public function xoaChiTietMua($idPhieu,$idVatTu)
    {
        try{
            DB::table('chitietmua')->where('ID_Phieu','=',$idPhieu)
                                   ->where('ID_VatTu','=',$idVatTu)
                                   ->delete();
            return "Thành công";
        }
        catch(Exception $e){
            return false;
        }
    }
    public function themChiTietMua($data)
    {
        $data=array($data)[0][0];
        try {
            DB::table('chitietmua')->insert([
                'ID_Phieu' => $data['idPhieu'],
                'ID_VatTu' => $data['idTB'],
                'SoLuong' => $data['soLuong'],
            ]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
