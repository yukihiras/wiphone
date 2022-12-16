<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => "required|email",
            "password" => "required",
        ];
        $message = [
            "email.required" => "Mời bạn nhập email",
            "email.email" => "Mời bạn nhập đúng định dạng email",
            "password.required" => "Mời bạn nhập mật khẩu",
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email' => $email, 'password' => $password])) { //attempt là xâm nhập hiểu nôm na là hàm này nhận các tham số để đăng nhập vào
                return redirect('admin');
            } else {
                Session::flash('error', 'sai email và mật khẩu');
                return redirect('login');
            }
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
