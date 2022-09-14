<x-header-datatable name="kutayarisha | Payments"/>
@include('header.navbar')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sidebar.sidebar')
        <x-wrapper-component pageName="Payments"
         :crumbs="array('payments.index'=>'payments', 'payments.index'=>'View payments')"/>
            <!-- Main content -->
            <x-message-helper class="alert alert-success m-4"/>
            <section class="content">
                <div class="container-fluid">
                    <x-table-component
                    :tableheads="['No', 
                    'Status', 'Reference', 
                    'Amount',  'Narrative',
                    'Date']"
                    :buttons="array('payments.index'=>'Excel', 'payments.create'=>'Csv')"
                    buttonsroute='payments.create'
                    createroute='payments.create'
                    add="Add New Payment">
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
                ajax: "{{ route('payments.index') }}",
                columns: [

                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'externalReference',
                        name: 'externalReference'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'narrative',
                        name: 'narrative'
                    },

                    {
                        data: 'created_at',
                        name: 'created_at'
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
