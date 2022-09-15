<x-header-component name="Kutayarisha | Admin Page"/>
@include('header.navbar')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('sidebar.sidebar')
<x-wrapper-component pageName="Dasboard"
:crumbs="array('admin'=>'Admin')"
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
                     <p>Name : {{$data['party']['name']}}</p>
                    <p>Phone Number : {{$data['party']['partyIdInfo']['partyIdentifier']}}</p>
                     <p>Party Id TYpe : {{$data['party']['partyIdInfo']['partyIdType']}}</p>
                     // add a 

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
