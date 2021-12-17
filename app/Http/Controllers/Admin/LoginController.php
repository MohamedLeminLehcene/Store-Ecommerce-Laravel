<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }


    public function login(LoginRequest $request)
    {

        $remember_me = $request -> has('remember_me') ? true : false;

        if(Auth()->guard('admin')->attempt(['email' => $request -> input('email'),'password' => $request -> input('password')]))
        {
                // notify()-> success('تم الدخول بالنجاح');
                return redirect() -> route('admin.dashbord');
        }
        // notify() -> error('خطأ بالبيانات رجاء محاول مجددا');
       return redirect()->back()->with(['error'=>'هناك خطأ بالبيانات']);
    }

}
