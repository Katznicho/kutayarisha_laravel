<x-header-component name="Manipal | Edit Comment" />
@include('header.navbar')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sidebar.sidebar')
        <x-wrapper-component pageName="Edit Comment"
         :crumbs="array('comments.index'=>'comments', 'comments.create'=>'Edit Comment')"
     />

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <!-- left column -->
                    <div class="col-md-6 ">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Commet</h3>
                            </div>

                            <form method="POST" action="{{route('comments.update', $comment->id)}}">
                                @csrf
                                <input type="hidden" name="_method" value="put" />
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
                                        <label for="exampleInputBorder">Commentor</label>
                                        <input type="text" class="form-control form-control-border"
                                        name="name" placeholder="enter user name"
                                         value="{{$comment->name}}"
                                         required disabled >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Comment</label>
                                        <textarea  name="comment"
                                            class="form-control"
                                            required>
                                            {{$comment->comment}}
                                        </textarea>

                                    </div>
                                    <div class='form-group'>
                                    <button type="submit" class="btn btn-primary btn-block">Edit Comment</button>
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
