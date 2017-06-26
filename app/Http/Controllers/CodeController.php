<?php

namespace App\Http\Controllers;

use App\Code;
use App\MainCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCode=MainCode::pluck('name_ar', 'id');
        return view('admin.Code',compact('mainCode'));
    }

    public function create()
    {
        $mainCode=MainCode::pluck('name_ar', 'id');
        return view('admin.AddEditeCode',compact('mainCode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code=new Code();
        $request['active'] = isset($request['active']) ? 1 : 0;
        $code->name_ar=$request->name_ar;
        $code->name_en=$request->name_en;
        $code->MainCodetb_id=$request->MainCodetb_id;
        $code->desc=$request->desc;
        $code->active=$request->active;
        $code->save();

        session()->flash('status', 's');
        session()->flash('msg', 'تم الحفظ بنجاح!');

        return back();
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $mainCode=MainCode::pluck('name_ar', 'id');
        $code=Code::find($id)->first();
        return view('admin.AddEditeCode',compact('code','mainCode'));
    }


    public function update(Request $request, $id)
    {
       $code=Code::find($id);
        $request['active'] = isset($request['active']) ? 1 : 0;
        $code->fill($request->all())->save();
        session()->flash('status', 's');
        session()->flash('msg', 'تم التعديل بنجاح!');
        return back();
    }


    public function destroy($id)
    {
        Code::find($id)->delete();
        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح!');
        return back();
    }

    public function anyData(Code $code)
    {

        $code = $code->all();


        return Datatables::of($code)

            ->editColumn('id', function ($model) {
                $all=$model->id;
                return $all;

            })

            ->editColumn('name_ar', function ($model) {
                $all=$model->name_ar;

                return $all;
            })
            ->editColumn('MainCodetb_id', function ($model) {

                $all=$model->MainCode->name_ar;
                return $all;
            })
            ->editColumn('desc', function ($model) {
                $all=$model->desc;
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



            ->editColumn('created_at', function ($model) {
                $all=  Carbon::parse($model->created_at)->toDateString() ;
                return $all;
            })


            ->editColumn('control', function ($model) {
                $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/admin/code/'.$model->id.'/edit"><i class="fa fa-edit"></i></a> ';

                $all .= '<a class="btn btn-md btn-danger Confirm" tooltip="حذف" href="/admin/code/'.$model->id.'/delete" ><i class="fa fa-remove"></a>';

                return $all;
            })
            ->rawColumns(['id','control','active'])

            ->make(true);

    }
}
