<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Mail;

class ForgetPassworedController extends Controller
{
    public function forgetPassword(){
        return view('admin.forget_password');
    }

    public function postForgetPassword(Request $request){
        $user=User::whereEmail($request->email)->first();
        $sentinelUser=Sentinel::findById($user->id);
        $reminder=Reminder::exists($sentinelUser)?:Reminder::create($sentinelUser);
        $this->sendEmail($sentinelUser,$reminder->code);
        session()->flash('status', 's');
        session()->flash('msg', 'مراجعة بريدك الالكتروني لاستعادة كلمة المرور');


    }
    private function sendEmail($user,$code){
        Mail::send('emails.forgetPassword',[
            'user'=>$user,
            'code'=>$code
        ],function ($message) use ($user){
            $message->from('info@moutaz.me');
            $message->to($user->email);
            $message->subject("مرحبا  $user->first_name, تفعيل الحساب");
        });
    }
    public function restPassword($email,$restCode){
        $user=User::whereEmail($email)->first();
        if(count($user)==0)
            abort(404);

        $sentinelUser=Sentinel::findById($user->id);
        if($reminder=Reminder::exists($sentinelUser))
        {
            if($restCode==$reminder->code)
                return view('admin.reset-password');
            else
                return redirect('/');
        }else
            dd($sentinelUser);// return redirect('/');
    }
    public function postRestPassword(Request $request,$email,$restCode){
        $user=User::whereEmail($email)->first();
        if(count($user)==0)// اازا ما في يوزر
            abort(404);

        $sentinelUser=Sentinel::findById($user->id);
        if($reminder=Reminder::exists($sentinelUser))
            if($restCode==$reminder->code) {
                Reminder::complete($sentinelUser, $restCode, $request->password);
                session()->flash('status', 's');
                session()->flash('msg', 'فوت بكلمة السر الجديد');

                return redirect('/login');
            }
            else
                abort(404);// return redirect('/');
        else
            abort(404);//  return redirect('/');

    }
}
