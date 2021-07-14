<?php

namespace App\Repositories\PhieuDeNghi;

use App\Repositories\RepositoryInterface;

interface PhieuDeNghiInterface extends RepositoryInterface
{
    public function getIDPhieuMua();
    public function listAll();
    public function xetDuyetMua($data, $id);
    public function myListPhieuMua();
    public function hoanThanhPhieuMua($id);
    // public function getIDPhieuSua();
    public function themPhieuMua($data);
    public function xoaPhieuMua($id);
    public function xoaChiTietMua($idPhieu,$idVatTu);
    public function themChiTietMua($data);
}
