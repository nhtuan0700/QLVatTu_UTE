<?php

namespace App\Http\Controllers;
use App\Helpers\Facade\FormatDate;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use App\Repositories\NguoiDung\NguoiDungInterface;
use Illuminate\Support\Facades\Hash;
class NguoiDungController extends Controller
{
    protected $nguoiDungRepo;

    public function __construct(NguoiDungInterface $nguoiDungInterface)
    {
        $this->nguoiDungRepo = $nguoiDungInterface;   
    }
    public function index()
    {
        $data = $this->nguoiDungRepo->list();
        return view('nguoidung.index', compact('data'));
    }

    public function profile()
    {
        return view('nguoidung.profile');
    }
    public function getupdateinfo($id){
        $user = NguoiDung::find($id);
        return view('nguoidung.profile', ['userinfo' => $user]);
    }
    public function postupdateinfo(Request $request, $id){
        $user = NguoiDung::find($id);
        $user->HoTen = $request->HoTen;
        //lỗi ngày tháng
        // $user->NgaySinh = FormatDate::formattosql($request->NgaySinh);
        $user->CMND = $request->CMND;
        $user->SDT = $request->SDT;
        $user->Email = $request->Email;
        $user->save();
        return  redirect('trangcanhan')->with('thongbao', 'Cập nhật thông tin thành công!');
    }
    public function getupdatepassword($id){
        $user = NguoiDung::find($id);
        return view('nguoidung.profile', ['userinfo' => $user]);
    }
    public function postupdatepassword(Request $request, $id){
        $user = NguoiDung::find($id);
        if($request->MatKhau === $request->NLMatKhau){
            $user->MatKhau = Hash::make($request->MatKhau);
            $user->save();
            return  redirect('trangcanhan')->with('thongbaothanhcong', 'Cập nhật mật khẩu thành công!');
        }
        else{
            return redirect('trangcanhan')->with('thongbaoloi', 'Mật khẩu không trùng khớp!');
        }
    }
}
