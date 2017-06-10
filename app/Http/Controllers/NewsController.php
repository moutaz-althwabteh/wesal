<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Logic\Image\ImageNewsRepository;
use App\MyNew;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

class NewsController  extends Controller
{

    protected $image;
    public function __construct(ImageNewsRepository $imageRepository)
    {

        $this->image = $imageRepository;

    }

    public function index()
    {
          return view('admin.News');
    }


    public function create()
    {
        $categories=Categorie::all();
        return view('admin.AddEditNews' ,compact('categories'));
    }


    public function store(Request $request)
    {
        $photo = Input::all();

        $response = $this->image->upload($photo);

        $result=json_decode($response->getContent(), true);
        if(!$result['error']){
            $request['active'] = isset($request['active']) ? 1 : 0;
            $request['main'] = isset($request['main']) ? 1 : 0;
            $myNews=new MyNew();
            $myNews->title=$request->title;
            $myNews->summary=$request->summary;
            $myNews->tags=$request->tags;
            $myNews->details=$request->details;
            $myNews->categorie_id=$request->categorie_id;
            $myNews->active=$request->active;
            $myNews->image=$result['filename'];
            $myNews->main=$request->main;
            $myNews->title=$request->title;

            $myNews->save();
            session()->flash('status', 's');
            session()->flash('msg', 'تم الحفظ بنجاح!');
        }else{
            session()->flash('status', 'd');
            session()->flash('msg', 'فشلت عملية الحفظ!');
        }

        return back();


    }


    public function show(MyNew $new)
    {
        //
    }
    public function edit($id)
    {
     $myNews=MyNew::find($id);
        $categories=Categorie::all();
        $categories = Categorie::pluck('name', 'id');
     return view('admin.AddEditNews',compact('myNews','categories'));
    }


    public function update(Request $request, $id)
    {
         $MyNew=MyNew::find($id);



        if(isset($request->image)){
            $response = $this->image->delete($MyNew->image);
            $photo = Input::all();
            $response = $this->image->upload($photo);
            $result=json_decode($response->getContent(), true);

            if(!$result['error']){
                $request['active'] = isset($request['active']) ? 1 : 0;
                $request['main'] = isset($request['main']) ? 1 : 0;
                $MyNew->title=$request->title;
                $MyNew->summary=$request->summary;
                $MyNew->tags=$request->tags;
                $MyNew->details=$request->details;
                $MyNew->categorie_id=$request->categorie_id;
                $MyNew->active=$request->active;
                $MyNew->image=$result['filename'];
                $MyNew->main=$request->main;
                $MyNew->save();

                session()->flash('status', 's');
                session()->flash('msg', 'تم التعديل بنجاح!');
            }else{
                session()->flash('status', 'd');
                session()->flash('msg', 'فشلت عملية التعديل!');
            }
        }else{
            $request['active'] = isset($request['active']) ? 1 : 0;
            $request['main'] = isset($request['main']) ? 1 : 0;
            $MyNew->title=$request->title;
            $MyNew->summary=$request->summary;
            $MyNew->tags=$request->tags;
            $MyNew->details=$request->details;
            $MyNew->categorie_id=$request->categorie_id;
            $MyNew->active=$request->active;
            $MyNew->main=$request->main;
            $MyNew->save();
            session()->flash('status', 's');
            session()->flash('msg', 'تم التعديل بنجاح!');

        }



        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyNew $new)
    {

        $response = $this->image->delete($new->image);
        $new->delete();
        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح!');
        return back();

    }

    public function anyData(MyNew $new)
    {


        $new = $new->all();


        return Datatables::of($new)

            ->editColumn('id', function ($model) {
                $all=$model->id;
                return $all;

            })
            ->editColumn('image', function ($model) {
                //$all=$model->filename;
                // $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/album/'.$model->filename.'/edit"><i class="fa fa-edit"></i></a> ';
                //$all = '<img src="myAdmin/Images/icon_size/'+$model->filename+'" /> ';
                return \Html::image('myAdmin/Images/small_size/'.$model->image.'', $model->image) ;
                //HTML::('img/picture.jpg')
                //return $all;

            })
            ->editColumn('title', function ($model) {
                $all=$model->title;
                return $all;
            })

            ->editColumn('categorie_id', function ($model) {

//                $all= $model->Albums->name ;
                $all=$model->Categorie->name;
                return $all;
            })
            ->editColumn('active', function ($model) {
                if($model->active)
                $all= '<input type="checkbox" disabled checked>';
                else
                    $all= '<input type="checkbox" disabled>';
                //$all=$model->active;
                return $all;
            })
            ->editColumn('main', function ($model) {
                if($model->main)
                    $all= '<input type="checkbox" disabled checked>';
                else
                    $all= '<input type="checkbox" disabled>';

                return $all;
            })


            ->editColumn('created_at', function ($model) {
                $all=  Carbon::parse($model->created_at)->toDateString() ;
                return $all;
            })

            ->editColumn('control', function ($model) {
                $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/admin/myNews/'.$model->id.'/edit"><i class="fa fa-edit"></i></a> ';

                $all .= '<a class="btn btn-md btn-danger Confirm" tooltip="حذف" href="/admin/myNews/'.$model->id.'/delete" ><i class="fa fa-remove"></a>';

                return $all;
            })
            ->rawColumns(['id','control','active','main'])

            ->make(true);

    }

}
