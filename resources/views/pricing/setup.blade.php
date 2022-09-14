<x-header-component name="Kutayarisha | Setup Payments" />
@include('header.navbar')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sidebar.sidebar')
        <x-wrapper-component pageName="Payment Details" :crumbs="['admin' => 'Setup Payment Details']" />
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center pb-5">
                            <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
                                <div class="py-4 d-flex flex-row">
                                    <h5><span class="far fa-check-square pe-2"></span><b>ELIGIBLE</b> |</h5>
                                    <span class="ps-2">Pay Either By Airtel or Mtn</span>
                                </div>
                                <h4 class="text-success">

                                    <span class="fas fa-money-bill-wave pe-2"></span>
                                    <span class="text-success">shs {{ $details->price }}</span>
                                </h4>
                                <h4>Package {{ $details->name }}</h4>

                                <hr />
                                <div class="pt-2">
                                    
                                    <form class="pb-3" >
                                        <div class="d-flex flex-row pb-3">
                                           
                                            <input type="text"
                                             class="form-control" 
                                              value="{{ Auth::user()->phone }}"
                                            placeholder="Enter Phone Number" />


                                            <br />

                                        <input type="button" value="Make Payment"
                                        class="btn btn-primary btn-block btn-lg" />

                                        </div>


                                    </form>

                                </div>
                            </div>

                            <div class="col-md-5 col-xl-4 offset-xl-1">
                                <div class="py-4 d-flex justify-content-end">
                                    <h6><a href="{{ route('admin') }}">Cancel and return to website</a></h6>
                                </div>
                                <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
                                    <div class="p-2 me-3">
                                        <h4>User Information</h4>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">UserName</div>
                                        <div class="ms-auto">

                                            {{ Auth::user()->name }}
                                        </div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">User Email</div>
                                        <div class="ms-auto">
                                            {{ Auth::user()->email }}
                                        </div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">
                                            PhoneNumber
                                        </div>
                                        <div class="ms-auto">
                                            {{ Auth::user()->phone }}
                                        </div>
                                    </div>

                                    <div class="border-top px-2 mx-2"></div>
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    @include('footer.footer')
    @include('helpers.scripts')
    <script>
         //submit using jquery
            $(document).ready(function(){
                $('input[type="button"]').click(function(e){
                    e.preventDefault();
                     alert('Payment is being processed !! Please wait');
                    var phone = $('input[type="text"]').val();
                    var price = "{{ $details->price }}";
                    var plan_id = "{{ $details->id }}";
                    var name = "{{ $details->name }}";
                    var package = "{{ $details->name }}";
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('payment') }}",
                        type: "POST",
                        data: {
                            phone: phone,
                            amount: price,
                            name: name,
                            _token: _token,
                            plan_id: plan_id,
                            package: package,

                        },
                        success: function(response){
                            if(response){
                                alert('A notification has been sent to your phone !! Please Complete the payment');
                                window.location.href = "{{ route('payments.index') }}";
                            }
                        }
                    });
                });
            });
    </script>
    

</body>

</html>
