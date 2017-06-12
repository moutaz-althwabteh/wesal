@extends('admin.welcome')
@section('title','| الصفحات الثابتة')
@section('header')
    {!!Html::style('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}
    {!!Html::style('assets/global/plugins/typeahead/typeahead.css') !!}


@endsection
@section('content')
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Form Actions On Top
                </div>

            </div>
            <div class="portlet-body form">

                <div class="form-body">

                    @if(isset($staticPage))
                        {!! Form::model($staticPage, [
                                   'class'=>'form-horizontal',
                                  'method' => 'PATCH',
                                   'route' => ['staticPage.update', $staticPage->id]
                              ])
                              !!}

                    @else
                        {!! Form::open([ 'class'=>'form-horizontal','url' => 'admin/staticPage']) !!}
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label">العنوان عربي</label>
                        <div class="col-md-9">

                            {!! Form::text("title_ar",null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">العنوان English</label>
                            <div class="col-md-9">

                                {!! Form::text("title_en",null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                    <div class="col-md-offset-3 col-md-9">
                        <div class="form-group">

                            <div class="checkbox-list">
                                <label class="checkbox-inline">
                                    <div class="checker" id="uniform-inlineCheckbox1"><span>
                                            {!! Form::checkbox('active') !!}
                                        </span>
                                    </div>
                                    فعال</label>
                             </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">التفاصيل عربي</label>
                        <div class="col-md-9">
                            {!! Form::textarea("desc_ar",null,['class'=>'textarea']) !!}
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">التفاصيل English</label>
                            <div class="col-md-9">
                                {!! Form::textarea("desc_en",null,['class'=>'textarea']) !!}
                            </div>
                        </div>

                    <div class="form-group">

                        <div class="form-group">

                            <div class="col-md-offset-3 col-md-9">

                                <p>
                                    @if(isset($staticPage))
                                        <button type="submit" class="btn green">حفظ</button>
                                    @else
                                        <button type="submit" class="btn blue">إضافة</button>
                                    @endif

                                    {!! link_to('/admin/staticPage', $title = 'رجوع', $attributes = ['class'=>'btn default  col-offset-3'], $secure = null) !!}

                                </p>

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
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

    <script>
        // $('textarea').ckeditor();
        $('.textarea').ckeditor(); // if class is prefered.
    </script>

@endsection