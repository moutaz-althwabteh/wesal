@extends('admin.welcome')
@section('title','|  اشعارات قاعدة البيانات ')
@section('header')
@endsection
@section('content')
    {!! Form::open(['id'=>'myForm','method' => 'get','url' => '/admin/notifyDB/store']) !!}
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-2 control-label">النص </label>

            <div class="col-md-6">
                {!! Form::text("name",null,['method' => 'get','class'=>'form-control','placeholder'=>'النص','id'=>'name']) !!}

            </div>

        </div>

    </div>
    <br> <br> <br> <br> <br> <br> <br> <br>
    <div class="col-md-12">
        <div class="form-group">

            <div class="col-md-3">
                <button id="notDb" class="btn btn-md blue col-md-8">اشعار عبر قاعدة بيانات</button>

            </div>

            <div class="col-md-3">
                <button id="read" class="btn btn-md blue col-md-8">make read</button>

            </div>


            <div class="col-md-3">
                <button id="delete"  class="btn btn-md blue col-md-8">مسح الاشعارات</button>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('footer')
   <script  >
       $(function () {
           $('#notDb').click(function (e) {
               e.preventDefault();
               var data = $('#myForm').serialize();

               $.ajax({
                   url: '/admin/notifyDB/storeAjax',
                   type: 'get',
                   data: data,
                   success: function (result) {
                       notify(result.status, result.msg);

                   },
                   error: function (data) {
                       var errors = data.responseJSON;
                       console.log(errors);
                   }
               });
           });

           $('#read').click(function (e) {
               e.preventDefault();

               $.ajax({
                   url: '/admin/notifyDB/readAjax',
                   type: 'get',

                   success: function (result) {
                       notify(result.status, result.msg);

                   },
                   error: function (data) {
                       var errors = data.responseJSON;
                       console.log(errors);
                   }
               });
           });
           $('#delete').click(function (e) {
               e.preventDefault();

               $.ajax({
                   url: '/admin/notifyDB/deleteAjax',
                   type: 'get',

                   success: function (result) {
                       notify(result.status, result.msg);

                   },
                   error: function (data) {
                       var errors = data.responseJSON;
                       console.log(errors);
                   }
               });
           });

       });
   </script>
@endsection
