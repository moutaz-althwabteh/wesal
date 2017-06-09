<?php

namespace App\Http\Controllers;

use App\Albums;
use App\Http\Requests\AlbumRequset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;


class AlbumsControllers extends Controller
{

    public function index()
    {
        $albums=Albums::all();

     return view('admin.Albums',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.AddEditAlbum');
    }
    /*
     *  protected function store(AddUserRequestDmin $request,User $user){
        //$user=new User();
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
       return back();
        // return redirect('/admin/user');
    }^/
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequset $request)
    {

       $album=new Albums();
       $album->name=$request->name;
        $album->save();
       return back()->withFlashMessage('تم الحفظ بنجاح');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album=Albums::find($id);
        return view('admin.AddEditAlbum',compact('album'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Albums::find($id);
        return view('admin.AddEditAlbum',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       // $name=$request->name;
        $album=Albums::find($id);
       // $album->name=$name;
       // $album->save();
        $album->fill($request->all())->save();
        // return back()->withFlashMessage('تم التعديل بنجاح');
        session()->flash('status', 's');
        session()->flash('msg', 'تم التعديل بنجاح!');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح!');
        return back();
    }
    public function delete($id)
    {
        $album=Albums::find($id);

        $image=$album->image();
      if($image->count()<=0){
        $album=Albums::find($id)->delete();
        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح!');
          return back();
      }
      else {
          session()->flash('status', 'd');
          session()->flash('msg', 'لايمكن حذف الألبوم يرجى التأكد من حذف جميع الصور التابعة له!');
          return back();
      }
     }

    public function anyData(Albums $album)
    {
          $albums = $album->all();

        return Datatables::of($albums)

            ->editColumn('id', function ($model) {
                $all=1;
                return $all;

            })
            ->editColumn('name', function ($model) {
                return \Html::link(''.$model->id.'', $model->name) ;
            })

         ->editColumn('created_at', function ($model) {
             $dt = Carbon::parse($model->created_at);
                $all=  $dt->toDateString();

             return $all;
            })


            ->editColumn('control', function ($model) {
                $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/admin/album/'.$model->id.'/edit"><i class="fa fa-edit"></i></a> ';

                    $all .= '<a class="btn btn-md btn-danger Confirm" tooltip="حذف" href="/admin/album/'.$model->id.'/delete" ><i class="fa fa-remove"></a>';

                return $all;
            })
            ->rawColumns(['id','control'])

            ->make(true);

    }
}
