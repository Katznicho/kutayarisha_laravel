<x-header-datatable name="Manipal | View User"/>
@include('header.navbar')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sidebar.sidebar')
        <x-wrapper-component pageName="Users"
         :crumbs="array('users.index'=>'Users', 'users.index'=>'View Users')"/>
            <!-- Main content -->
            <x-message-helper class="alert alert-success m-4"/>
            <section class="content">
                <div class="container-fluid">
                    <x-table-component
                    :tableheads="['No', 'Name', 'Email']"
                    :buttons="array('users.index'=>'Excel', 'users.create'=>'Csv')"
                    buttonsroute='users.create'
                    createroute='users.create'
                    add="Add New User">
                     User Details
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
                ajax: "{{ route('users.index') }}",
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
                        data: 'email',
                        name: 'email'
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
