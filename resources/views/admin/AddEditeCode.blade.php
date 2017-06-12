@extends('admin.welcome')
@section('title','|  بيانات الأكواد')
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
                    إضافة / تعديل كود
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-md-12">
                        @if(isset($code))
                            {!! Form::model($code, [
                                    'class'=>'form-horizontal',
                                  'method' => 'PATCH',
                                  'route' => ['code.update', $code->id]
                              ])
                              !!}

                        @else
                            {!! Form::open(['id'=>'myFom','url' => 'admin/code ', 'class'=>'form-horizontal',]) !!}

                        @endif
                            <div class="form-group">
                                <label class="col-md-3 control-label">تصنيف الكود</label>
                                <div class="col-md-9">

                                    {!! Form::select('MainCodetb_id', $mainCode, null, ['class' => 'form-control']) !!}


                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">اسم الكود عربي</label>

                            <div class="col-md-9">
                                {!! Form::text("name_ar",null,['class'=>'form-control','placeholder'=>'أدخل اسم الألبوم']) !!}

                            </div>
                        </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">اسم الكود English</label>

                                <div class="col-md-9">
                                    {!! Form::text("name_en",null,['class'=>'form-control','placeholder'=>'أدخل اسم الألبوم']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">وصف الكود </label>

                                <div class="col-md-9">
                                    {!! Form::text("desc",null,['class'=>'form-control','placeholder'=>'أدخل اسم الألبوم']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                            <div class="checkbox-list ">
                                <label class="checkbox-inline col-md-offset-4">
                                    <div class="checker" id="uniform-inlineCheckbox1"><span>
                                            {!! Form::checkbox('active') !!}
                                        </span>
                                    </div>
                                    فعال</label>

                            </div>
                            </div>
                            <div class="col-md-4">
                                @if(isset($code))
                                    <button type="submit"  class="btn btn-md blue">حفظ</button>
                                    @else
                                    <button type="submit"  class="btn btn-md blue">إضافة</button>
                                    @endif

                                <a  href="/admin/code" class="btn yellow">رجوع</a>
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