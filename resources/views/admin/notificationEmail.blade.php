@extends('admin.welcome')
@section('title','|  اشعارات قاعدة البيانات ')
@section('header')
@endsection
@section('content')
    <div class="form-group">

        <div class="col-md-8">
            <button id="sendEmail" class="btn btn-md blue col-md-8">ارسال رسالة الى العضو (مثال)</button>

        </div>
    </div>

@endsection
@section('footer')
    <script>
        $(function () {
            $('#sendEmail').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/admin/sendEmailAjax',
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