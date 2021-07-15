<?php

namespace App\Repositories\PhieuBanGiao;

use App\Models\ChiTietBanGiao;
use App\Models\PhieuBanGiao;
use Carbon\Carbon;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function confirmPhieuBG($id_phieuBG)
    {
        $this->update($id_phieuBG,['ID_NguoiXN' => Auth::user()->ID,'NgayBanGiao' => Carbon::now('Asia/Ho_Chi_Minh')]);
    }
    public function themPhieuBanGiao($data)
    {
        $newID = $this->getIDPhieuBG();
        $this->model->insert([
            'ID' => $newID,
            'ID_PhieuDN' => $data['ID_PhieuDN'],
            'ID_NVCSVC' => Auth::user()->ID
        ]);
        try {
            foreach ($data['data'] as  $item)
            {
                DB::table('ChiTietBanGiao')->insert([
                    'ID_Phieu' => $newID,
                    'ID_VatTu' => $item['idTB'],
                    'SoLuong' => $item['soLuong'],
                ]);
            }
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function suaPhieuBanGiao($data)
    {
        try {
            foreach($data['data'] as $item)
            {
                DB::table('chitietbangiao')->where('ID_Phieu', $data['ID_PhieuBG'])->where('ID_VatTu',$item['idTB'])->update(['SoLuong' => $item['soLuong']]);
            }
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
    public function xoaPhieuBanGiao($id)
    {
        try {
            DB::table('chitietbangiao')->where('ID_Phieu', '=',$id)->delete();
            DB::table('phieubangiao')->where('ID', '=',$id)->delete();
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
}
