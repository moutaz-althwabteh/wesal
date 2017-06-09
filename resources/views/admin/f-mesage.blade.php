@if(Session::has('status'))

    <script>
        $.notific8('<h5>{{Session::get('msg')}}</h5>', {
            life: 5000,
            // heading: '<a href="http://www.jqueryscript.net/tags.php?/Notification/">Notification</a> Heading',
            theme: '{{Session::get('status')=="s"?"teal":"ruby"}}',
            sticky: false,
            horizontalEdge: 'bottom',
            verticalEdge: 'right',
            zindex: 1500,
            icon: true,
            closeText: 'close',
            onInit: null,
            onCreate: null,
            onClose: null

        });

    </script>
@endif
