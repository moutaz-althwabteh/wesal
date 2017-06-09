@extends('admin.welcome')
@section('title','|  بيانات الألبوم')
@section('header')

@endsection
@section('content')
<div class="row ar" id="pnlTable" runat="server">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
                    إضافة / تعديل ألبوم
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-md-12">
                        @if(isset($album))
                            {!! Form::model($album, [
                                   'id'=>'myFom',
                                  'method' => 'PATCH',
                                  'route' => ['album.update', $album->id]
                              ])
                              !!}

                        @else
                            {!! Form::open(['id'=>'myFom','url' => '/album']) !!}

                        @endif

                            <div class="form-group">
                                <label class="col-md-2 control-label">اسم الألبوم</label>

                                <div class="col-md-6">
                                    {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'أدخل اسم الألبوم']) !!}

                                </div>

                                <div class="col-md-4">
                                    <button type="submit"  class="btn btn-md blue">حفظ</button>
                                    <a  href="/admin/album" class="btn yellow">رجوع</a>
                                </div>
                            </div>

                            {!! Form::close() !!}




                  </div>
                </div>
            </div>


        </div>
    </div>

@endsection
@section('footer')




@endsection