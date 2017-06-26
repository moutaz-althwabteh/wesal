<table id="data"  class="table table-bordered table-hover table-striped">
    <tfoot>
    <tr>
        <th  style="text-align: center;border: none;"></th>
        <th style="text-align: center;border: none;">اسم الألبوم</th>
        <th style="text-align: center;border: none;"></th>
        <th style="text-align: center;border: none;"></th>

    </tr>
    </tfoot>
    <thead>
    <tr>
        <th style="text-align: center" >#</th>
        <th style="text-align: center">اسم الألبوم</th>
        <th style="text-align: center">تاريخ الإضافة</th>
        <th style="text-align: center">التحكم</th>
    </tr>
    </thead>
    <tbody>


    </tbody>
</table>

{!!Html::script('/assets/global/plugins/datatables/datatables.min.js') !!}
{!!Html::script('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{{--{!!Html::script('/assets/pages/scripts/table-datatables-buttons.min.js') !!}--}}

<script type="text/javascript">

    var ind=1;
    var lastIdx = null;

    $('#data thead th').each( function () {
        if($(this).index() ==1) {
            var classname = 'form-control col-md-2';
            var title = $(this).html();
            $(this).html('<input type="text" class="' + classname + '" style="float:left; width: 80%" data-value="' + $(this).index() + '" placeholder="ابحث ب'+title+'" />');

        }
    } );

    var table = $('#data').DataTable({
        "sort":true,
        processing: true,
        serverSide: true,
        ajax: '{{ url('album/data') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'control', name: ''}
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
        },
        "stateSave": false,
        "responsive": false,
        "order": [[0, 'desc']],
        "pagingType": "numbers",
        aLengthMenu: [
            [10,20, 50, 100, 200, -1],
            [10,20, 50, 100, 200, "All"]
        ],
        iDisplayLength: 10,
        fixedHeader: false,

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
        $('input', table.column(colIdx).header()).on('keyup change', function(e) {

            table
                .column(colIdx)
                .search(this.value)
                .draw();

        });
        $('input', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
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

</script>


<style>
    .dataTables_wrapper .dataTables_processing{
        position:absolute;
        top:50%;

        height:40px;

        font-size:1.2em;
        background-color:white}

</style>