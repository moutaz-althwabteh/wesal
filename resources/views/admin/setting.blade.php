@extends('admin.welcome')
@section('title','|الاعدادت')
@section('header')
@endsection
@section('content')
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Form Actions On Top
                </div>
                {{--<div class="tools">--}}
                {{--<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>--}}
                {{--<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>--}}
                {{--<a href="javascript:;" class="reload" data-original-title="" title=""> </a>--}}
                {{--<a href="javascript:;" class="remove" data-original-title="" title=""> </a>--}}
                {{--</div>--}}
            </div>
            <div class="portlet-body form">

                <div class="form-body">

                        @if(isset($setting))
                            {!! Form::model($setting, [
                                       'class'=>'form-horizontal',
                                      'method' => 'post',
                                      'url' => 'admin/setting/update'
                                  ])
                                  !!}

                        @else
                            {!! Form::open([ 'class'=>'form-horizontal','url' => 'admin/setting']) !!}
                            @endif
                    {{$setting->title_ar}}
                        <div class="form-group">
                            <label class="col-md-3 control-label">عنوان الموقع عربي</label>
                            <div class="col-md-9">
                                {!! Form::text("title_ar",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">عنوان الموقع انجليزي</label>
                            <div class="col-md-9">
                                {!! Form::text("title_en",null,['class'=>'form-control']) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">عن الشركة عربي</label>
                            <div class="col-md-9">
                                 {!! Form::text("about_ar",null,['class'=>'form-control']) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">عن الشركة انجليزي</label>
                            <div class="col-md-9">
                                {!! Form::text("about_en",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Facebook</label>
                            <div class="col-md-9">
                                {!! Form::text("facebook",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Twitter</label>
                            <div class="col-md-9">
                                 {!! Form::text("twitter",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Youtube</label>
                            <div class="col-md-9">
                                {!! Form::text("youtube",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">بريد إلكتروني</label>
                            <div class="col-md-9">
                                {!! Form::text("email",null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">الهاتف</label>
                            <div class="col-md-9">
                                {!! Form::text("tel",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">الفاكس</label>
                            <div class="col-md-9">
                                {!! Form::text("fax",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">رقم المحمول</label>
                            <div class="col-md-9">
                                {!! Form::text("mobile",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">خط الطول على خرائط غوغل Longtude</label>
                            <div class="col-md-9">
                               {!! Form::text("Longtude",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">خط العرض على خرائط غوغل Latitude</label>
                            <div class="col-md-9">
                                {!! Form::text("Latitude",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">العنوان</label>
                            <div class="col-md-9">
                                 {!! Form::text("title_place",null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                            <div class="col-md-offset-3 col-md-4">
                                {!! Form::checkbox('maintenance', '1') !!}
                            </div>
                            <div class="form-group">

                        <div class="form-group">

                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">
                                    <i class="fa fa-pencil"></i> حفظ</button>

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