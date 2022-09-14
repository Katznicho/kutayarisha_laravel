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
          <div class="row">
            <!-- <x-dashboard-cards :total="$total_users" class="fas fa-tags" iconClass="info-box-icon bg-info elevation-1">
                Total Users
            </x-dashboard-cards>
            <x-dash-board-cards :total="$total_comments" class="fas fa-sort-amount-up-alt" iconClass="info-box-icon bg-danger elevation-1">
                Total Comments
            </x-dash-board-card>

            <x-dash-board-cards :total="$total_approved_comments" class="fas fa-handshake"
             iconClass="info-box-icon bg-success elevation-1">
                Approved Comments
            </x-dash-board-card>
            <x-dash-board-cards :total="$total_unapproved_comments" class="fas fa-handshake"
            iconClass="info-box-icon bg-success elevation-1">
               UnApproved Comments
           </x-dash-board-card> -->

          </div>
     </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
           @if ($user->subscriptionPlan == null)
            <div class="col-md-12">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">You have not subscribed to any plan</h3>
                </div>
                <div class="card-body">
                  <p>Subscribe to a plan to enjoy all the features of the application</p>
                  <a href="{{route('pricing')}}" class="btn btn-danger">Subscribe</a>
                </div>
              </div>
              @elseif ($user->subscriptionPlan)
              <div class="col-md-12">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">You are subscribed to {{$planName->name}}</h3>
                  </div>
                  <div class="card-body">
                    <p>Enjoy all the features of the application</p>
                    <a href="{{route('pricing')}}" class="btn btn-success">View Plan</a>
                  </div>
                </div>

           @endif

        

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
