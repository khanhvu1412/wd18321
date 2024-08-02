<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authentication
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Http\Requests\UserLoginRequest;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(UserLoginRequest $req)
    {
        // Validate 
        // $req->validate([
        //     'email' => 'required|email|exists:users,email', // users tên bảng 
        //     'password' => 'required|min:8' 
        // ], [
        //     'email.required'=> 'Email không được để trống',
        //     'email.email' => 'Email không đúng định dạng',
        //     'email.exists' => 'Email chưa được đăng ký',
        //     'password.required'=> 'Password không được để trống',
        //     'password.min' => 'Password quá ngắn'
        // ]);
        

        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password // plain text
        ];
        $remember = $req->has('remember');

        if (Auth::attempt($dataUserLogin, $remember)) {

            //Logout all account from other brower
            // Session::where('id', Auth::id())->delete();
            // // Create new session Login
            // session()->put('id', Auth::id());

            if (Auth::user()->role == 1) {
                return redirect()->route('admin.products.listProducts')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                echo "<h4>Xin chào User Chào mừng vào trang chủ</h4>";
            }
            // return redirect()->route('admin.products.listProducts')->with([
            //     'message' => 'Đăng nhập thành công'
            // ]);

            // Lỗ chưa đăng nhập đc

        } else {
            return redirect()->route('login')->with([
                'message' => 'Email hoặc password không đúng'
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }


    public function register()
    {
        return view('register');
    }

    public function postRegister(UserLoginRequest $req)
    {
        $check = User::where('email', $req->email)->exists();
        if ($check) {
            return redirect()->back()->with([
                'message' => 'Email đã tồn tại'
            ]);
        } else {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->pass)
            ];
            $newUser = User::create($data);
            // Auth::login($newUser); // tự động login
            // return => trang chủ


            return redirect()->route('login')->with([
                'message' => 'Đăng kí thành công'
            ]);
        }
    }
}
