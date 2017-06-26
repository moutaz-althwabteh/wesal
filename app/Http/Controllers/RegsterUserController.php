<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sentinel;
use Yajra\Datatables\Facades\Datatables;
use Activation;
class RegsterUserController extends Controller
{
private $title;
private $subject;

    public function index(){

        return view('admin.Register',compact('roles'));
    }
    public function show($id)
    {
        $slug=Sentinel::getUser()->roles()->first()->slug;
        dd($slug);
    }
    public function create()
    {

        $roles=Sentinel::getRoleRepository()->get();

        return view('admin.AddEditUser',compact('roles'));
    }
    public function store(Request $request)
    {
        dd($request->all());
        $user=User::where('email',$request->email)->first();
        if(!isset($user)){

        if(isset($request->active)) {
            $user = Sentinel::register($request->all(), true);//registerAndActivate
        }
        else {
            $user = Sentinel::register($request->all());
        }

        }else{
                session()->flash('status', 'd');
                session()->flash('msg', 'تم التسجيل مسبقاً يهذا الحساب');
            return back();
            }

        session()->flash('status', 's');
        session()->flash('msg', 'تم الحفظ بنجاح');
        return back();
    }
    public function edit($id)
    {
        $Myroles=Sentinel::findById($id)->roles;
        foreach ($Myroles as $myrole){
            $myrole=  $myrole->pivot->role_id;
        }
        $roles=Sentinel::getRoleRepository()->get();
        $user=Sentinel::findById($id);
        $active=Activation::completed($user);

        return view('admin.AddEditUser',compact('user','roles','myrole','active'));
    }
    public function update(Request $request, $id)
    {
        $user=Sentinel::findById($id);

        $user->fill($request->all())->save();
        if(isset($request->active)) {

            if(!Activation::completed($user)){
                $active=Activation::create($user);
                Activation::complete($user,$active->code);
            }
}
        else
            Activation::remove($user);


        session()->flash('status', 's');
        session()->flash('msg', 'تم التعديل بنجاح');
        return view('admin.register');

    }
    public function anyData(User $user)
    {

        $users = $user->get();

        return Datatables::of($users)

            ->editColumn('id', function ($model) {
                $all=$model->id;
                return $all;
            })
            ->editColumn('first_name', function ($model) {
                $all=$model->first_name;
                return $all;
            })
            ->editColumn('last_name', function ($model) {
                $all=$model->last_name;
                return $all;
            })
            ->editColumn('email', function ($model) {
                $all=$model->email;
                return $all;
            })
            ->editColumn('role', function ($model) {
                $roles =Sentinel::findById($model->id)->roles;
                foreach ($roles as $role){
                    //  dd($s->role_id);
                    $all=$role->pivot->role_id;
                }
                $all=Sentinel::findRoleById($all);
                return  $all->name;
            })
            ->editColumn('Permission', function ($model) {
                $all = '<a class="btn btn-md btn blue"tooltip="تعديل" href="/register/'.$model->id.'/edit"><i class="fa fa-lock"></i></a> ';
                return  $all;
            })
            ->editColumn('edit', function ($model) {
                $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/register/'.$model->id.'/edit"><i class="fa fa-edit"></i></a> ';
                return  $all;
            })
            ->editColumn('delete', function ($model) {
                $all = '<a class="btn btn-md btn-danger Confirm" tooltip="حذف" href="/register/'.$model->id.'/delete" ><i class="fa fa-remove"></a>';
                    //'<a class="btn btn-md btn red"tooltip="تعديل" href="/register/'.$model->id.'/edit"><i class="fa fa-remove"></i></a> ';
                return  $all;
            })
            ->rawColumns(['id','Permission','edit','delete'])

            ->make(true);

    }
    public function delete($id){
        $user=User::find($id)->delete();

        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح');
        return back();
    }
    public function SendMail(){
        return view('admin.SendMail');
    }


    public function postSendMail(Request $request){
        /*FUN PHP - Higher order functions*/
        $emails=collect(explode(",",$request->emails));

        $send_email_var=function ($title,$subject){
           return function ($item) use ($title,$subject){
               $this->sendEmail($item,$title,$subject);
            };

        };

        $rt=$emails->map($send_email_var($request->title,$request->subject));

        return back();

//     $title2=$request->title;
//        $subject2=$request->subject;
//        $emails=collect(explode(",",$request->emails));
//            $total =$emails->map(function ($item)use ($title2,$subject2){
//               $this->sendEmail($item,$title2,$subject2);
//                });




        //            $this->title=$request->title;
//            $this->subject=$request->subject;
//         $emails=collect(explode(",",$request->emails));
//
//            $total =$emails->map(function ($item){
//               $this->sendEmail($item,$this->title,$this->subject);
//                });
        }

    private function sendEmail($email,$title,$subject){
        Mail::send('emails.sendEmail',[
            'subject'=>$subject
        ],function ($message) use ($email,$title,$subject){
            $message->from('info@moutaz.me');
            $message->to($email);
            $message->subject($title);
        });
        if(count(Mail::failures()) > 0){
            $errors = 'Failed to send password reset email, please try again.';
        }
    }


}

