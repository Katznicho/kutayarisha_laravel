
                    <div class="row">
                        <div class="col-12">
                            <!--table-->
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title ">{{$slot}}</h3>
                                    <h4 class="float-sm-right ">
                                        <a class="btn btn-success" href="{{ route($createroute) }}"> {{$add}}
                                            </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                         <!--buttons-->
                                          @foreach ($buttons as $key=>$value)
                                          <a class="btn btn-success" href="{{ route($buttonsroute, $key) }}">{{$value}}</a>
                                          @endforeach

                                            <!--buttons-->
                                        <table class="table table-bordered data-table">
                                            <thead>
                                                <tr>
                                                    @foreach ($tableheads as $tablehead)
                                                    <th> {{$tablehead}}</th>
                                                    @endforeach

                                                    <th width="280px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>


                                </div>


                            </div>
                            <!-- /.card -->
                            <!--table-->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
