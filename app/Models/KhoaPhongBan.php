<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoaPhongBan extends Model
{
    protected $fillable = [
        'Ten', 'Loai'
    ];

    protected $table = 'KhoaPhongBan';

    protected $primaryKey = 'ID';
    public $incrementing = false;
}
