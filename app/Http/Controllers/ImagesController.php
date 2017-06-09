<?php

namespace App\Http\Controllers;

use App\Albums;
use App\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Logic\Image\ImageRepository;
use Yajra\Datatables\Facades\Datatables;
class ImagesController extends Controller
{
    protected $image;

    public function __construct(ImageRepository $imageRepository)
    {

        $this->image = $imageRepository;

    }

    public function index()
    {
        $images=Image::all();
        $albums=Albums::all();
        return view('admin.Images',compact('albums'));
    }
    public function create()
    {
        $albums=Albums::all();
        return view('admin.ImageMultiUpload',compact('albums'));
    }
    public function show($id){
        dd('show');
    }

   public function postUpload(){
       $photo = Input::all();
     //  dd(json_encode($photo));
       $response = $this->image->upload($photo);
       return $response;
    //   dd($photo);
   }
    public function deleteUpload()
    {

        $filename = Input::get('id');

        if(!$filename)
        {
            return 0;
        }

        $response = $this->image->delete( $filename );

        return $response;
    }
    public function anyData(Image $image)
    {



        $images = $image->all();


        return Datatables::of($images)

            ->editColumn('id', function ($model) {
                $all=$model->id;
                return $all;

            })
            ->editColumn('filename', function ($model) {
                //$all=$model->filename;
               // $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/album/'.$model->filename.'/edit"><i class="fa fa-edit"></i></a> ';
                //$all = '<img src="myAdmin/Images/icon_size/'+$model->filename+'" /> ';
                return \Html::image('myAdmin/Images/small_size/'.$model->filename.'', $model->filename) ;
                //HTML::('img/picture.jpg')
                //return $all;

            })
            ->editColumn('name', function ($model) {
                return \Html::link(''.$model->id.'', $model->name) ;
            })

            ->editColumn('albums_Id', function ($model) {

                $all= $model->Albums->name ;

                return $all;
            })


            ->editColumn('created_at', function ($model) {
                $all=  Carbon::parse($model->created_at)->toDateString() ;
                return $all;
            })
            ->editColumn('link', function ($model) {
                $all = '<a class="btn btn-md btn yellow"tooltip="الرابط" target="_blank" href="/myAdmin/Images/full_size/'.$model->filename.'"><i class="fa fa-link"></i></a> ';
                   return $all;
            })

            ->editColumn('control', function ($model) {
                $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/image/'.$model->id.'/edit"><i class="fa fa-edit"></i></a> ';

                $all .= '<a class="btn btn-md btn-danger Confirm" tooltip="حذف" href="/image/'.$model->id.'/delete" ><i class="fa fa-remove"></a>';

                return $all;
            })
            ->rawColumns(['id','control','link'])

            ->make(true);

    }

    public function getDelete($id){

        $response = $this->image->delete( $id );

        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح!');
        return back();
    }
}
