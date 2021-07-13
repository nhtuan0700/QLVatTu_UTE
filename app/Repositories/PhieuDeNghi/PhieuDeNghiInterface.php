<?php

namespace App\Repositories\PhieuDeNghi;

use App\Repositories\RepositoryInterface;

interface PhieuDeNghiInterface extends RepositoryInterface
{
    public function getIDPhieuMua();
    public function listAll();
    public function myListPhieuMua();
    public function confirmHoanThanh($id_phieuBG);
    // public function getIDPhieuSua();
}
