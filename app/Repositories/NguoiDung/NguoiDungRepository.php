<?php

namespace App\Repositories\NguoiDung;

use App\Models\NguoiDung;
use App\Repositories\BaseRepository;

class NguoiDungRepository extends BaseRepository implements NguoiDungInterface
{
    public function getModel()
    {
        return NguoiDung::class;
    }

    public function list() {
        return $this->model->select()->orderby('ID', 'desc')->paginate($this->limit);
    }
}
