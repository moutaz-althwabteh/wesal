@extends('admin.welcome')
@section('title','| المقالات')
@section('header')
    {!!Html::style('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}
    {!!Html::style('assets/global/plugins/typeahead/typeahead.css') !!}
    {!!Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}

    <style>
        .bootstrap-tagsinput {
            min-width: 100%;
        }
    </style>
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

                    @if(isset($myNews))
                        {!! Form::model($myNews, [
                                   'enctype'=>'multipart/form-data',
                                   'class'=>'form-horizontal',
                                  'method' => 'PATCH',
                                   'route' => ['myNews.update', $myNews->id]
                              ])
                              !!}

                    @else
                        {!! Form::open([ 'class'=>'form-horizontal','url' => 'admin/myNews','enctype'=>'multipart/form-data']) !!}
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label">العنوان الرئيسي عربي</label>
                        <div class="col-md-9">

                            {!! Form::text("title",null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">الملخص</label>
                        <div class="col-md-9">
                            {!! Form::textarea("summary",null,['class'=>'form-control','rows'=>'4']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">الكلمات المفتاحية</label>
                        <div class="col-md-9">

                            {!! Form::text("tags",null,['class'=>'form-control','data-role'=>'tagsinput','style'=>'min-width:100%']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">التصنيف</label>
                        <div class="col-md-9">

                       {!! Form::select('categorie_id', $categories, null, ['class' => 'form-control']) !!}


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">اضافة صورة</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-exists" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                    @if(isset($myNews))
                                        <img src="/myAdmin/Images/full_size/{{$myNews->image}}">
                                        @endif
                                </div>

                                <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-offset-4 col-md-4">
                            <div class="form-group">

                                <div class="checkbox-list">
                                    <label class="checkbox-inline">
                                        <div class="checker" id="uniform-inlineCheckbox1"><span>
                                            {!! Form::checkbox('active') !!}
                                        </span>
                                        </div>
                                        فعال</label>
                                    <label class="checkbox-inline">
                                        <div class="checker" id="uniform-inlineCheckbox2"><span>
                                             {!! Form::checkbox('main') !!}
                                        </span>
                                        </div>
                                        رئيسي </label>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">التفاصيل</label>
                        <div class="col-md-9">
                            {!! Form::textarea("details",null,['class'=>'textarea']) !!}
                        </div>
                    </div>



                    <div class="form-group">

                        <div class="form-group">

                            <div class="col-md-offset-3 col-md-9">

                                <p>
                                    @if(isset($myNews))
                                        <button type="submit" class="btn green">حفظ</button>
                                        @else
                                        <button type="submit" class="btn blue">إضافة</button>
                                        @endif

                                    {!! link_to('/admin/myNews', $title = 'رجوع', $attributes = ['class'=>'btn default  col-offset-3'], $secure = null) !!}

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
    <script src="/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script>
        // $('textarea').ckeditor();
        $('.textarea').ckeditor(); // if class is prefered.
    </script>
    <script>
        $(document).on('ready', function() {
            $(".fileinput").fileinput({
                initialPreview: [
                    'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
                    'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg'
                ],
                initialPreviewAsData: true,
                initialPreviewConfig: [
                    {caption: "Moon.jpg", size: 930321, width: "120px", key: 1},
                    {caption: "Earth.jpg", size: 1218822, width: "120px", key: 2}
                ],
                deleteUrl: "/site/file-delete",
                overwriteInitial: false,
                maxFileSize: 100,
                initialCaption: "The Moon and the Earth"
            });
        });
    </script>
@endsection