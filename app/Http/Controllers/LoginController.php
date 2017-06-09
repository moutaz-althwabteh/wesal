<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request){
        if(Sentinel::guest())
        return view('admin.login');
        else
            return redirect('/admin');
    }
    public function  postLogin(Request $request)
    {
        try {
            $remmper=false;
            if($request->remmber_me)
                $remmper=true;
            if (Sentinel::authenticate($request->all(),$remmper))
                return Sentinel::check();
            else
                return redirect()->back()->with(['error' => 'خطأ في كلمة المرور أو اسم المستخدم']);
        }catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e){
            return redirect()->back()->with(['error' => "هذ الحساب غير مفعل"]);
        }
        catch (ThrottlingException $e){
            $dely=$e->getDelay();
            return redirect()->back()->with(['error' => " دخول خاطئ يرجة الانتظار $dely ثانية "]);
        }
    }

    public function  postLogout(Request $request){
        Sentinel::logout();
        return redirect('/login');
    }
}
