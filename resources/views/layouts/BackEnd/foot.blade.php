
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    {!! Html::script('BackEnd/assets/node_modules/jquery/jquery.min.js') !!}
    <!-- Bootstrap popper Core JavaScript -->
    {!! Html::script('BackEnd/assets/node_modules/bootstrap/js/popper.min.js') !!}
    {!! Html::script('BackEnd/assets/node_modules/bootstrap/js/bootstrap.min.js') !!}
    <!-- slimscrollbar scrollbar JavaScript -->
    {!! Html::script('BackEnd/assets/node_modules/ps/perfect-scrollbar.jquery.min.js') !!}
    <!--Wave Effects -->
    @if(app()->getLocale()=="en")
        {!! Html::script('BackEnd/main/js/waves.js') !!}
        {!! Html::script('BackEnd/main/js/sidebarmenu.js') !!}
        <!--Custom JavaScript -->
        {!! Html::script('BackEnd/main/js/custom.min.js') !!}
        {!! Html::script('BackEnd/main/js/dashboard1.js') !!}
    @else
        {!! Html::script('BackEnd/main-ar/js/waves.js') !!}
        {!! Html::script('BackEnd/main-ar/js/sidebarmenu.js') !!}
        <!--Custom JavaScript -->
        {!! Html::script('BackEnd/main-ar/js/custom.min.js') !!}
        {!! Html::script('BackEnd/main-ar/js/dashboard1.js') !!}
    @endif

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    {!! Html::script('BackEnd/assets/node_modules/raphael/raphael-min.js') !!}
    {!! Html::script('BackEnd/assets/node_modules/morrisjs/morris.min.js') !!}
    <!--c3 JavaScript -->
    {!! Html::script('BackEnd/assets/node_modules/d3/d3.min.js') !!}
    {!! Html::script('BackEnd/assets/node_modules/c3-master/c3.min.js') !!}
    <!-- Popup message jquery -->
    {!! Html::script('BackEnd/assets/node_modules/toast-master/js/jquery.toast.js') !!}
    <!-- Chart JS -->

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    {!! Html::script('BackEnd/assets/node_modules/styleswitcher/jQuery.style.switcher.js') !!}

    {{-- ----------------------------------------------------------------------------- --}}
        <!--stickey kit -->
        {!! Html::script('BackEnd/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') !!}
        {!! Html::script('BackEnd/assets/node_modules/sparkline/jquery.sparkline.min.js') !!}
        {!! Html::script('BackEnd/assets/node_modules/datatables/jquery.dataTables.min.js') !!}
        <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <!-- end - This is for export functionality only -->
        <script>
        $(function() {
            $('#myTable').DataTable();
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        
        </script>
        @if ($message = Session::get('success'))
        <script>
        $.toast({
                heading: 'success',
                text: '{{ $message }}',
                position: 'top-right',
                loaderBg: '#f33c49',
                icon: 'success',
                hideAfter: 6000,
                stack: 6
            })
        </script>
            @endif
