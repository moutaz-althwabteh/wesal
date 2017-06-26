<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use App\Notifications\SmsNotification;
use App\Notifications\TestNotification;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function NotificationDB()
    {
//        $user=Sentinel::check();
//        $user=User::find($user->id);
//        $user->notify(new TestNotification());
//        $users=User::get();
//        \Illuminate\Support\Facades\Notification::send($users,new TestNotification());
//        return redirect('/');
        $user=\Cartalyst\Sentinel\Laravel\Facades\Sentinel::check();
        $user=\App\User::find($user->id);

        return view('admin.notificationDB');
    }

    public function CreateNotificationDB(Request $request)
    {
        $user=Sentinel::check();
        $user=User::find($user->id);
        $user->notify(new TestNotification($request->name));
        return back();
    }
    public function CreateNotificationDBAjax(Request $request)
    {
        $user=Sentinel::check();
        $user=User::find($user->id);
        $user->notify(new TestNotification($request->name));
        return response(['status'=>'s','msg'=>'تم انشاء اشعار عبر الداتا بيز']);
    }

    public function readAjax()
    {
        $user=Sentinel::check();
        $user=User::find($user->id);
        foreach ($user->notifications as $notification) {
            $notification->markAsRead();
        }
        return response(['status'=>'s','msg'=>'تم قراءة جميع الاشعارات']);
    }
    public function deleteAjax()
    {
        $user=Sentinel::check();
        $user=User::find($user->id);
        $user->notifications()->delete();
//        foreach ($user->notifications as $notification) {
//            $notification->markAsRead();
//        }
        return response(['status'=>'s','msg'=>'تم حذف جميع الاشعارات']);
    }

    // sms
    public function notifyEmil()
    {
        return view('admin.notificationEmail');
    }
    public function sendEmailAjax(){
        $user=Sentinel::check();
        $user=User::find($user->id);
        Notification::send($user,new EmailNotification($user));
        return response(['status'=>'s','msg'=>'تم ارسال الرسالة']);
    }

    //sms
    public function notifySms()
    {
        return view('admin.notificationSms');
    }
    public function sendSmsAjax(){
        $user=Sentinel::check();
        $user=User::find($user->id);

     Notification::send($user,new SmsNotification());

        return response(['status'=>'s','msg'=>'تم ارسال رسالة على الجوال']);
    }

}
