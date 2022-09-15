<x-header-component name="Kutayarisha | Admin Page"/>
@include('header.navbar')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('sidebar.sidebar')
<x-wrapper-component pageName="Majo loop Demo"
:crumbs="array('admin'=>'Mojaloop demo')"
/>
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
     </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="">

                <p>W are illustration how to use mojaloop </p>
                
                <div id="mojaloop">
                     <p>Amount  to pay: {{$data['authorization']['amount']['amount']}}</p>
                    <p>Currency  : {{$data['authorization']['amount']['currency']}}</p>

                     
                        <a href="{{route('start')}}" class="btn btn-success">Confirm Payment</a>

                </div>







        

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('footer.footer')
  @include('helpers.scripts')
  <script>
     let session_var  = "{{Session::get('success')}}";
     if(session_var){
        $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Logged in',
        position: 'topRight',
        body: "Welcome Back {{Session::get('names')}}",
      })
      session_var = false;
     }
  </script>
</body>
</html>
