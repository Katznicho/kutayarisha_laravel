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
                 <div>
                       <p>W are illustration how to use mojaloop in three steps</p>
                 </div>
                 <div>
                      <p>We are looping up a user using default number 
                          <span class="badge badge-success">
                           16135551212
                          </span>

                        </p>
                 </div>

                
                <div id="mojaloop m-4">
                    <a href="https://mojaloop.io/" class="btn btn-success">View Demo we are using</a>
                </div>


                          <div class="row m-3">
            <div class="col-md-6">
                                 <a href="{{route('mojaloop.show','1')}}" class="btn btn-success">
                   Lookup User</a>
            </div>


            </div>

            </div>


 
         <br>







        

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
