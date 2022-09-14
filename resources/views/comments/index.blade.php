<x-header-datatable name="Manipal | View Coments"/>
@include('header.navbar')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sidebar.sidebar')
        <x-wrapper-component pageName="Comments"
         :crumbs="array('comments.index'=>'Comments', 'comments.index'=>'View Comments')"/>
            <!-- Main content -->
            <x-message-helper class="alert alert-success m-4"/>
            <section class="content">
                <div class="container-fluid">
                    <x-table-component
                    :tableheads="['No', 'Name', 'Comment',  'Approval']"
                    :buttons="array('comments.index'=>'Excel', 'comments.create'=>'Csv')"
                    buttonsroute='comments.create'
                    createroute='comments.create'
                    add="Add New User">
                      Comment Details
                   </x-table-component>

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('footer.footer')
      @include('helpers.datatablescripts')

      <!-- Toastr -->
   <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

    <!--serverside-->
    <script type="text/javascript">

        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                // pageLength:20,
                // scrollX:true,
                ajax: "{{ route('comments.index') }}",
                columns: [

                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'comment',
                        name: 'comment'
                    },

                    {
                        data: 'approve',
                        name: 'approve'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            })
        });
    </script>
    <!--serverside-->

</body>
</html>
