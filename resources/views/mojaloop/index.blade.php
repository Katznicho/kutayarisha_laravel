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
                             <a href="https://mojaloop.io/" class="btn btn-success">View Demo we are using</a>
                </div>

            </div>
 
        
          <div class="row">
                       <a href="{{route('majoloop.show')}}" class="btn btn-success">Lookup User</a>
           
            
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
