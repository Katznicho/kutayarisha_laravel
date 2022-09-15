<x-header-component name="Kutayarisha | Admin Page"/>
@include('header.navbar')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('sidebar.sidebar')
<x-wrapper-component pageName="Moja loop Demo"
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
                     <p>Name : {{$data['party']['name']}}</p>
                    <p>Phone Number : {{$data['party']['partyIdInfo']['partyIdentifier']}}</p>
                     <p>Party Id TYpe : {{$data['party']['partyIdInfo']['partyIdType']}}</p>

                     
                        <form action="{{route('start')}}" method="post">
                             @csrf
                               <div class="d-flex flex-row pb-3">
                                            
                                <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                                            <input type="text"
                                             class="form-control" 
                                              value=""
                                               name="amount"
                                               required
                                            placeholder="Enter amount" />
                                        
                                            <select name="currency" required class="form-control">
                                                <option value="KES">KES</option>
                                                <option value="USD">USD</option>
                                                <option value="UGX">UGX</option>
                                            </select>
                                            
                                            <br />


                                        </div>

                                        
                                        <button type="submit" class="btn btn-success">Initiate Payment</button>

                        </form>        

                     


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
