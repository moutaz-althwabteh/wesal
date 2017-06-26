@extends('admin.welcome')
@section('title','|  بيانات الألبوم')
@section('header')
    {!!Html::script('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}
@endsection
@section('content')
    <div class="row ar" id="pnlTable">
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
                            {!! Form::open(['id'=>'myFom','url' => '/admin/album']) !!}

                        @endif

                        <div class="form-group">
                            <label class="col-md-2 control-label">اسم الألبوم</label>

                            <div class="col-md-6">
                                {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'أدخل اسم الألبوم','id'=>'name']) !!}

                            </div>

                            <div class="col-md-4">
                                <button type="submit" id="createAlbume" class="btn btn-md blue">حفظ</button>
                                <a href="/admin/album" class="btn yellow">رجوع</a>
                            </div>
                        </div>

                        {!! Form::close() !!}


                    </div>
                    <br><br>
                    <div id="div_table"></div>
                </div>
            </div>


        </div>
    </div>

@endsection
@section('footer')

    <!-- Modal -->
    <div class="modal fade" id="pop_update" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <script type="text/javascript">

        $(function () {

            readByAjax();
            $('#myFom').submit(function (e) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');
                var post = $(this).attr('method');
                var _token = $('input[name="_token"]').val();
                var name = $('input[name="name"]').val();
                $.ajax({
                    url: url,
                    type: post,
                    data: data,
                    success: function (result) {
                        notify(result.status, result.msg);
                        readByAjax();
                    },
                    error: function (data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                });
            });
        });

/*
        $(document).on('click', '.btn_del', function (e) {
            e.preventDefault();
            var _token = $('input[name="_token"]').val();
            var id = $(this).val();

            $.ajax({
                type: 'get',
                url: '/admin/album/ajaxDelete',
//                datatype: 'json',
                data: {"id": id, "_token": _token},
                success: function (result) {
                    var status = result.status;
                    var msg = result.msg;

                    readByAjax();

                    notify(status, msg);

                }


            });
        });
*/

        $(document).on('click', '.btn_edit', function (e) {
            var _token = $('input[name="_token"]').val();
            var id = $(this).val();
            alert( $('#myFom').attr('action'))

            $.ajax({
                type: 'get',
                url: "{{url('admin/album/ajaxEdit')}}",
//                datatype:'json',
                data: {id: id},
                success: function (result) {

                    var id = result.id;
                    var inpPath='<input type="hidden" name="_method" value="patch">';
                    var frmUpdate=$('#myFom');
                    var action=frmUpdate.attr('action');

                    frmUpdate.append(inpPath);
                    frmUpdate.attr('action','/admin/album/'+id);
//                    frmUpdate.attr('action',');
                    frmUpdate.find('#name').val(result.name);

                }
            });
        });


        function readByAjax() {

            $.ajax({
                type: 'get',
                url: '/admin/album/index2',
                dataType: 'html',
                success: function (result) {
                    $('#div_table').html(result);
//                    console.log(result);
                }
            });
        }

    </script>

    {!!Html::script('/assets/global/plugins/datatables/datatables.min.js') !!}
    {!!Html::script('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}


@endsection