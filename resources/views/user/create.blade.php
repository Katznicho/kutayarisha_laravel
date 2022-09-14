<x-header-component name="Manipal | Add User" />
@include('header.navbar')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sidebar.sidebar')
        <x-wrapper-component pageName="Add User"
         :crumbs="array('users.index'=>'users', 'users.create'=>'Add  Role')"
     />

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <!-- left column -->
                    <div class="col-md-6 ">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add User</h3>
                            </div>

                            <form method="POST" action="{{route('users.store')}}">
                                @csrf
                                <div class="card-body">
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="exampleInputBorder">Name</label>
                                        <input type="text" class="form-control form-control-border"
                                        name="name" placeholder="enter user name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Email</label>
                                        <input type="text" class="form-control form-control-border"
                                        name="email" placeholder="enter user email " required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Password</label>
                                        <input type="password" class="form-control form-control-border"
                                        name="password" placeholder="enter user password" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Confirm Password</label>
                                        <input type="password_confirmation" class="form-control form-control-border"
                                        name="password" placeholder="confirm password" required>

                                    </div>
                                    <div class='form-group'>
                                    <button type="submit" class="btn btn-primary btn-block">Add User</button>
                                    </div>
                                </div>

                            </div>
                            </form>

                        <!--left column-->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    </div>
    @include('footer.footer')
    @include('helpers.scripts')


</body>

</html>
