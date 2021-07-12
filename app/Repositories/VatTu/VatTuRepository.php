<?php

namespace App\Repositories\VatTu;

use App\Models\VatTu;
use App\Repositories\BaseRepository;

class VatTuRepository extends BaseRepository implements VatTuInterface
{
    public function getModel()
    {
        return VatTu::class;
    }

    public function list()
    {
        return $this->model->select()->paginate($this->limit);
    }
}
