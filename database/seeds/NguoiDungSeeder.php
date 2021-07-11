<?php

use App\Models\NguoiDung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 'ND00000001',
            'TaiKhoan' => 'admin',
            'MatKhau' => Hash::make('123123'),
            'LoaiTK' => NguoiDung::ADMIN
        ];
        NguoiDung::insert($data);
    }
}
