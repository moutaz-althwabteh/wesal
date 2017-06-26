@extends('admin.welcome')
@section('title','|  اشعارات رسائل الجوال ')
@section('header')
@endsection
@section('content')
    <div class="form-group">

        <div class="col-md-8">
            <button id="sendSms" class="btn btn-md blue col-md-8">ارسال رسالة الى الجوال (مثال)</button>

        </div>
    </div>

@endsection
@section('footer')
    <script>
        $(function () {
            $('#sendSms').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/admin/sendSmsAjax',
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