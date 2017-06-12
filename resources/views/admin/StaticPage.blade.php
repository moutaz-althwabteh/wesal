@extends('admin.welcome')
@section('title','|  الصفحات الثابتة')
@section('header')
    {!!Html::script('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <a href="/admin/staticPage/create" class="btn sbold green space10"><i class="fa fa-plus"></i>إضافة صفحة ثابتة</a>


        </div>

    </div>

    <br/>
    <div class="col-md-12">

        <div class="box-body">
            <table id="data"  class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th width="20px">#</th>
                    <th>العنوان</th>
                    <th>فعال</th>
                    <th>رابط الصفحة</th>
                    <th>تاريخ الاضافة</th>
                    <th>التحكم</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>

    </div>

@endsection
@section('footer')
    {!!Html::script('/assets/global/plugins/datatables/datatables.min.js') !!}
    {!!Html::script('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
    <script type="text/javascript">


        var lastIdx = null;

        $('#data thead th').each( function () {
            {{--if($(this).index() ==2) {--}}
            {{--var classname = 'form-control';--}}
            {{--var title = $(this).html();--}}
            {{--$(this).html('<input type="text" class="' + classname + '" data-value="' + $(this).index() + '" placeholder="ابحث ب'+title+'" />');--}}

            {{--}--}}
            {{--else if($(this).index() ==3){--}}
            {{--$(this).html( '@if(isset($albums))<select class="form-control" ><option value="">الكل</option>@foreach($albums as $albums)<option value="{{$albums->id}}"> {{$albums->name}} </option>@endforeach</select>@endif')}--}}

        } );

        var table = $('#data').DataTable({
            "sort":false,
            processing: true,
            serverSide: true,
            ajax: '{{ url('admin/staticPage/data') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title_ar', name: 'title_ar'},
                 {data: 'active', name: 'active'},
                {data: 'linke', name: ''},
                {data: 'created_at', name: 'created_at'},
                {data: 'control', name: ''}
            ],
            "language": {
                "url": "{{ Request::root()  }}/cus/Arabic.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [


                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible",


                    }
                ],

                "sSwfPath": "{{ Request::root()  }}/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'left');
            }

        });


        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {

                e.stopPropagation();
            });
        });

        $('#data tbody')
            .on( 'mouseover', 'td', function () {
                var colIdx = table.cell(this).index().column;

                if ( colIdx !== lastIdx ) {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                    $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                }
            } )
            .on( 'mouseleave', function () {
                $( table.cells().nodes() ).removeClass( 'highlight' );
            } );

    </script>
@endsection