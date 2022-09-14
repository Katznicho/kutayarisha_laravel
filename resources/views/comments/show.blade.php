<x-header-component name="Manipal | Staff Roles" />
@include('header.navbar')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sidebar.sidebar')
        <x-wrapper-component pageName="Comment Details" :crumbs="['comments.index' => 'Comments', 'comments.create' => 'View Comments']" />

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Commentor: {{$comment->name}}
                                </h3>
                                <br/>
                                <small>Below are the details about a comment</small>
                            </div>
                            <div class="card-body pad table-responsive">
                                <div>
                                    <h2>Comment:</h1>
                                        <p>
                                            {{$comment->comment}}
                                        </p>

                                </div>
                                <div>
                                    <h2>Approval</h1>
                                        @if ($comment->approved==false)
                                           Pending Approval
                                        @else
                                           Decline
                                        @endif


                                </div>

                                <div class="row m-4">
                                    @if ($comment->approved==false)
                                    <a class="btn btn-success"
                                    href="{{ route('comments.approve', $comment->id) }}">Approve</a>

                                    @else
                                    <a class="btn btn-danger"
                                    href="{{ route('comments.approve', $comment->id) }}">Decline</a>
                                    @endif

                                    <a class="btn btn-primary ml-2"
                                    href="{{ route('comments.edit', $comment->id) }}">Edit</a>

                                </div>


                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    @include('footer.footer')
    @include('helpers.scripts')
    <script>
        // jQuery Code starts from here

        $(function() {
            $("input[type='checkbox']").change(function() {
                $(this).siblings('ul')
                    .find("input[type='checkbox']")
                    .prop('checked', this.checked);

            });
        });
    </script>
</body>

</html>
