<?php

namespace App\Http\Controllers;

use App\StaticPage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class StaticPageController extends Controller
{
    public function index()
    {
        return view('admin.StaticPage');
    }

    public function create()
    {
        return view('admin.AddEditStaticPage');

    }

    public function store(Request $request)
    {
        $staticPage=new  StaticPage();
        $staticPage->title_ar=$request->title_ar;
        $staticPage->title_en=$request->title_en;
        $staticPage->desc_ar=$request->desc_ar;
        $staticPage->desc_en=$request->desc_en;
        $request['active'] = isset($request['active']) ? 1 : 0;
        $staticPage->active=$request->active;
        $staticPage->save();
        session()->flash('status', 's');
        session()->flash('msg', 'تم الحفظ بنجاح!');

        return back();
    }

    public function edit($id)
    {
        $staticPage=StaticPage::find($id);
        return view('admin.AddEditStaticPage',compact('staticPage'));
    }

    public function update(Request $request, $id)
    {

        $staticPage=StaticPage::find($id);
        $request['active'] = isset($request['active']) ? 1 : 0;
        $staticPage->fill($request->all())->save();

        session()->flash('status', 's');
        session()->flash('msg', 'تم التعديل بنجاح!');
        return back();
    }
    public function destroy(StaticPage $staticPage)
    {
        $staticPage->delete();
        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح!');
        return back();

    }

    public function anyData(StaticPage $staticPage)
    {


        $staticPage = $staticPage->all();


        return Datatables::of($staticPage)

            ->editColumn('id', function ($model) {
                $all=$model->id;
                return $all;

            })

            ->editColumn('title_ar', function ($model) {
                $all=$model->title_ar;
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

            ->editColumn('linke', function ($model) {
               $all='page.aspx?'.$model->id;
                return $all;
            })

            ->editColumn('control', function ($model) {
                $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/admin/staticPage/'.$model->id.'/edit"><i class="fa fa-edit"></i></a> ';

                $all .= '<a class="btn btn-md btn-danger Confirm" tooltip="حذف" href="/admin/staticPage/'.$model->id.'/delete" ><i class="fa fa-remove"></a>';

                return $all;
            })
            ->rawColumns(['id','control','active'])

            ->make(true);

    }
}
