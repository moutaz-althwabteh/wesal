@extends('admin.welcome')
@section('title','|  بيانات الاخبار')
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
                        <label class="col-md-3 control-label">العنوان الرئيسي عربي</label>
                        <div class="col-md-9">
                            {!! Form::text("title",null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">الملخص</label>
                        <div class="col-md-9">
                            {!! Form::textarea("summary",null,['class'=>'form-control']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">الكلمات المفتاحية</label>
                        <div class="col-md-9">
                            {!! Form::text("tags",null,['class'=>'form-control']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">التفاصيل</label>
                        <div class="col-md-9">
                            {!! Form::text("details",null,['class'=>'form-control']) !!}
                        </div>
                    </div>



                    <div class="col-md-offset-3 col-md-4">
                        {!! Form::checkbox('maintenance', '1s') !!}
                        {!! Form::checkbox('maintenance2', '1s') !!}
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