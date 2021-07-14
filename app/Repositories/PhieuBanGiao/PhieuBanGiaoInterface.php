<?php

namespace App\Repositories\PhieuBanGiao;

use App\Repositories\RepositoryInterface;

interface PhieuBanGiaoInterface extends RepositoryInterface
{
    public function getIDPhieuBG();

    public function list();

    public function myList();

    public function xacNhan($id_phieuBG);
}
