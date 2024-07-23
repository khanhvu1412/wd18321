<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserContronller extends Controller
{
    // function showUser()
    // {
    // 1. Lấy danh sách toàn bộ user (select * from users)
    // $listUsers = DB::table('users')->get();
    // dd kiểm tra dữ liệu bên laravel
    // dd($listUsers);

    // 2. Lấy thông tin user có id = 4 (select * from users where id = 4)
    // C1
    // $result = DB::table('users')->where('id', '=','4')->first();
    // dd($result);
    // // C2 ko tìm đc where
    // $result = DB::table('users')->find('5');

    // 3. Lấy thuộc tính 'name' của user có id = 16
    // $result = DB::table('users')->where('id','=','16')->value('name');

    // 4. Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
    // $idPhongBan = DB::table('phongban')
    //         ->where('ten_donvi','like','%Ban giám hiệu%')
    //         ->value('id');
    // $result = DB::table('users')->where('phongban_id', $idPhongBan)->pluck('id');

    // 5. Tìm user có độ tuổi lớn nhất trong công ty 
    // $result = DB::table('users')
    //         ->where('tuoi', DB::table('users')->max('tuoi'))
    //         ->get();

    // 6. Tìm user có độ tuổi nhỏ nhất trong công ty
    // $result = DB::table('users')
    //         ->where('tuoi', DB::table('users')->min('tuoi'))
    //         ->get();

    // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user 
    // $idPhongBan = DB::table('phongban')
    //         ->where('ten_donvi','like','%Ban giám hiệu%')
    //         ->value('id');
    // $result = DB::table('users')
    //         ->where('phongban_id', $idPhongBan)
    //         ->count('id');

    // 8. Lấy danh sách tuổi các user
    // $result = DB::table('users')->distinct()
    //         ->pluck('tuoi');

    // 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
    // $result = DB::table('users')
    //         ->where('name','like','%Khải')
    //         ->orWhere('name', 'like','%Thanh')->get();

    // 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
    // $idPhongBan = DB::table('phongban')
    //         ->where('ten_donvi','like','%Ban đào tạo%')
    //         ->value('id');
    // $result = DB::table('users')
    //         ->where('phongban_id', $idPhongBan)
    //         ->select('id', 'name', 'email')
    //         ->get();

    // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
    // $result = DB::table('users')
    //         ->where('tuoi', '>=', "30")
    //         ->select('id', 'name', 'email', 'tuoi')
    //         ->orderBy('tuoi', 'asc')
    //         ->get();

    // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
    // $result = DB::table('users')
    //         ->where('tuoi', '>=', "30")
    //         ->select('id', 'name', 'email', 'tuoi')
    //         ->orderBy('tuoi', 'desc')
    //         ->offset(5)
    //         ->limit(10)
    //         ->get();

    // 13. Thêm một user mới vào công ty
    // $data = [
    //     'name' => 'Nguyễn Văn A',
    //     'email' => 'abc@gamil.com',
    //     'phongban_id' => '1',
    //     'songaynghi'  => '0',
    //     'tuoi' => '18',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    // ];
    // DB::table('users')->insert($data);
    // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
    // $idPhongBan = DB::table('phongban')
    //         ->where('ten_donvi','like','%Ban đào tạo%')
    //         ->value('id');
    // $result = DB::table('users')
    //         ->where('phongban_id', $idPhongBan)
    //         ->select('id', 'name', 'email')
    //         ->get();
    // foreach($result as $value){
    //     DB::table('users')->where('id', $value->id)->update([
    //         'name' => $value->name . 'PDT'
    //     ]);
    // }

    // 15. Xóa user nghỉ quá 15 ngày
    // DB::table('users')->where('songaynghi', '>', '15')->delete();
    // dd($result);
    // }


    // function getUser($id, $name = ''){
    //     echo $id;
    //     echo $name ;
    // }

    // function updateUser(Request $request){
    //     echo $request->id;
    //     echo $request->name;
    // }

    public function listUsers()
    {
        $listUsers = DB::table('users')
            ->join('phongban', 'phongban.id', '=', 'users.phongban_id')
            ->select('users.id', 'users.name', 'users.email', 'users.phongban_id', 'users.tuoi', 'users.songaynghi', 'phongban.ten_donvi')
            ->get();

        return view('users/listUsers')->with([
            'listUsers' => $listUsers
        ]);
    }

    public function addUsers()
    {
        $phongban = DB::table('phongban')->select('id', 'ten_donvi')->get();
        return view('users/addUsers')->with([
            'phongban' => $phongban
        ]);
    }

    public function addPostUsers(Request $req)
    {
        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'phongban_id' => $req->phongbanUser,
            'tuoi' => $req->tuoiUser,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);

        return redirect()->route('users.listUsers');
    }

    public function deleteUsers($idUser)
    {
        DB::table('users')->where('id', $idUser)->delete();
        return redirect()->route('users.listUsers');
    }

    public function updateUsers($idUser)
    {
        $phongban = DB::table('phongban')->select('id', 'ten_donvi')->get();
        $user = DB::table('users')->where('id', $idUser)->first();
        return view('users/updateUsers')->with([
            'user' => $user,
            'phongban' => $phongban
        ]);
    }

    public function updatePostUsers(Request $req)
    {
        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'phongban_id' => $req->phongbanUser,
            'tuoi' => $req->tuoiUser,
            'songaynghi' => $req->ngaynghiUser,
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->where('id', $req->idUser)->update($data);

        return redirect()->route('users.listUsers');
    }

    public function test()
    {
        return view('admin/product/list-product');
    }
}
