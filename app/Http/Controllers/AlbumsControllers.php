<?php

namespace App\Http\Controllers;

use App\Albums;
use App\DataTable\AlbumDataTable;
use App\Http\Requests\AlbumRequset;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;


class AlbumsControllers extends Controller
{

    public function index(AlbumDataTable $dataTable)
    {
        return $dataTable->render('admin.Album.index');
    }

    public function index2()
    {
        $albums = Albums::orderBy('id', 'asc')->get();
        return view('admin.AlbumsAjax', compact('albums'));
    }

    public function index3()
    {
        $albums = Albums::orderBy('id', 'asc')->get();

        return view('admin.AlbumsAjax2', compact('albums'));
    }

    public function create()
    {

        return view('admin.AddEditAlbum');
    }

    public function store(AlbumRequset $request)
    {

        if ($request->ajax()) {
            $album = new Albums();
            $album->name = $request->name;
            if ($album->save())
                return response(['status' => 's', 'msg' => 'تمت عملية الاضافة بنجاح']);
            else
                return response(['status' => 'd', 'msg' => 'تمت عملية الاضافة بنجاح']);
//            return response($request->all());
        } else {
            $errors = $request->errors();

            return response(['e' => '$errors->first()']);

        }

        $album = new Albums();
        $album->name = $request->name;
        $album->save();
        return back()->withFlashMessage('تم الحفظ بنجاح');;

    }

    public function show($id)
    {
        $album = Albums::find($id);
        return view('admin.AddEditAlbum', compact('album'));

    }


    public function edit($id)
    {
        $album = Albums::find($id);
        return view('admin.AddEditAlbum', compact('album'));
    }


    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $album = Albums::find($id);
            $album->fill($request->all())->save();
            return response(['status' => 's', 'msg' => 'تمت عملية التعديل بنجاح']);
        } else {
            session()->flash('status', 's');
            session()->flash('msg', 'تم التعديل بنجاح!');
            return back();
        }
        // $name=$request->name;

        // $album->name=$name;
        // $album->save();

        // return back()->withFlashMessage('تم التعديل بنجاح');

    }


    public function destroy($id)
    {

        session()->flash('status', 's');
        session()->flash('msg', 'تم الحذف بنجاح!');
        return back();
    }

    public function delete($id)
    {
        $album = Albums::find($id);

        $image = $album->image();
        if ($image->count() <= 0) {
            $album = Albums::find($id)->delete();
            session()->flash('status', 's');
            session()->flash('msg', 'تم الحذف بنجاح!');
            return back();
        } else {
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
                $all = $model->id;
                return $all;

            })
            ->editColumn('name', function ($model) {
                return \Html::link('' . $model->id . '', $model->name);
            })
            ->editColumn('created_at', function ($model) {
                $dt = Carbon::parse($model->created_at);
                $all = $dt->toDateString();

                return $all;
            })
            ->editColumn('control', function ($model) {
                $all = '<a class="btn btn-md btn green"tooltip="تعديل" href="/admin/album/' . $model->id . '/edit"><i class="fa fa-edit"></i></a> ';

                $all .= '<a class="btn btn-md btn-danger ConfirmAjax" name="' . $model->id . '" tooltip="حذف" href="/admin/album/' . $model->id . '/delete" ><i class="fa fa-remove"></a>';
//                    $all.='<button value="'.$model->id.'" class="btn btn-md btn-danger Confirm btn_del"><i class="fa fa-remove"></button>';
                return $all;
            })
            ->rawColumns(['id', 'control'])
            ->make(true);

    }

//    AJAX
    public function deleteajax(Request $r)
    {
        if ($r->ajax()) {
            $id = $r->id;
            $album = Albums::find($id);
            $image = $album->image();
            if ($image->count() <= 0) {
                $album = Albums::find($id)->delete();

                return response(['status' => 's', 'msg' => 'تم الحذف بنجاح']);
            } else {
                return response(['status' => 'd', 'msg' => 'لايمكن حذف الألبوم يرجى التأكد من حذف جميع الصور التابعة له!']);
            }
        }

    }

    public function editAjax(Request $request)
    {
        if ($request->ajax()) {
            $album = Albums::find($request->id);
            return Response($album);

        }
    }
}
