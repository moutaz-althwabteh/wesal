@extends('admin.welcome')
@section('title','|ارسال رسالة')
@section('header')
    {!!Html::style('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}
    {!!Html::style('assets/global/plugins/typeahead/typeahead.css') !!}


@endsection
@section('content')
    {!!  Form::open(['url' => 'user/SendMail']) !!}
    <div class="col-md-12">
            <div class="portlet-body form">
                <div class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-3 control-label"></div>
                            <div class="col-md-9">
                                <input type="text" name="emails"  data-role="tagsinput" >
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">عنوان الرسالة</label>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control" placeholder="عنوان الرسالة">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">الموضوع</label>
                            <div class="col-md-9">
                                <textarea  name="subject" class="form-control textarea" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    {!! Form::close() !!}
@endsection
@section('footer')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script src="/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>

    <script>
       // $('textarea').ckeditor();
         $('.textarea').ckeditor(); // if class is prefered.
    </script>
@endsection