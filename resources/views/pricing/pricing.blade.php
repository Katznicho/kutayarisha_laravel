<x-header-component name="Kutayarisha | Pricing"/>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900">
<style>
  @import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800);
.pricing1 {
  font-family: "Montserrat", sans-serif;
  color: #8d97ad;
  font-weight: 300;
}

.pricing1 h1,
.pricing1 h2,
.pricing1 h3,
.pricing1 h4,
.pricing1 h5,
.pricing1 h6 {
  color: #3e4555;
}

.pricing1 .font-weight-medium {
  font-weight: 500;
}

.pricing1 .bg-light {
  background-color: #f4f8fa !important;
}

.pricing1 .subtitle {
  color: #8d97ad;
  line-height: 24px;
  font-size: 14px;
}

.pricing1 .font-14 {
  font-size: 14px;
}

.pricing1 h5 {
    line-height: 22px;
    font-size: 18px;
}

.pricing1 .card.card-shadow {
  -webkit-box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
  box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
}

.pricing1 .on-hover {
  -webkit-transition: 0.1s;
  -o-transition: 0.1s;
  transition: 0.1s;
}

.pricing1 .on-hover:hover {
  -ms-transform: scale(1.05);
  transform: scale(1.05);
  -webkit-transform: scale(1.05);
  -webkit-font-smoothing: antialiased;
}

.pricing1 .btn-success-gradiant {
  background: #2cdd9b;
  background: -webkit-linear-gradient(legacy-direction(to right), #2cdd9b 0%, #1dc8cc 100%);
  background: -webkit-gradient(linear, left top, right top, from(#2cdd9b), to(#1dc8cc));
  background: -webkit-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
  background: -o-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
  background: linear-gradient(to right, #2cdd9b 0%, #1dc8cc 100%);
}

.pricing1 .btn-success-gradiant:hover {
  background: #1dc8cc;
  background: -webkit-linear-gradient(legacy-direction(to right), #1dc8cc 0%, #2cdd9b 100%);
  background: -webkit-gradient(linear, left top, right top, from(#1dc8cc), to(#2cdd9b));
  background: -webkit-linear-gradient(left, #1dc8cc 0%, #2cdd9b 100%);
  background: -o-linear-gradient(left, #1dc8cc 0%, #2cdd9b 100%);
  background: linear-gradient(to right, #1dc8cc 0%, #2cdd9b 100%);
}

.pricing1 .btn-danger-gradiant {
  background: #ff4d7e;
  background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
  background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
  background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
  background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
  background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
}

.pricing1 .btn-danger-gradiant:hover {
  background: #ff6a5b;
  background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
  background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
  background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
  background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
  background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
}

.pricing1 .btn-md {
  padding: 15px 30px;
  font-size: 16px;
}

.pricing1 .onoffswitch {
  width: 70px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  margin: 0 auto;
}

.pricing1 .onoffswitch-label {
  cursor: pointer;
  border: 2px solid transparent;
  border-radius: 20px;
}

.pricing1 .onoffswitch-inner {
  width: 200%;
  margin-left: -100%;
  -webkit-transition: margin 0.3s ease-in 0s;
  -o-transition: margin 0.3s ease-in 0s;
  transition: margin 0.3s ease-in 0s;
}

.pricing1 .onoffswitch-inner::before,
.pricing1 .onoffswitch-inner::after {
  display: block;
  float: left;
  width: 50%;
  height: 30px;
  padding: 0;
  line-height: 30px;
  font-size: 14px;
  color: white;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.pricing1 .onoffswitch-inner::before {
  content: "";
  padding-right: 27px;
  background-color: #2cdd9b;
  color: #FFFFFF;
}

.pricing1 .onoffswitch-inner::after {
  content: "";
  padding-right: 24px;
  background-color: #3e4555;
  color: #999999;
  text-align: right;
}

.pricing1 .onoffswitch-switch {
  width: 23px;
  margin: 6px;
  height: 23px;
  top: -1px;
  bottom: 0;
  right: 35px;
  border-radius: 20px;
  -webkit-transition: all 0.3s ease-in 0s;
  -o-transition: all 0.3s ease-in 0s;
  transition: all 0.3s ease-in 0s;
}

.pricing1 .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-inner {
  margin-left: 0;
}

.pricing1 .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-switch {
  right: 0px;
}

.pricing1 .price-badge {
  top: -13px;
  left: 0;
  right: 0;
  width: 100px;
  margin: 0 auto;
}

.pricing1 .badge-inverse {
  background-color: #3e4555;
}

.pricing1 .display-5 {
  font-size: 3rem;
	color: #263238;
}

.pricing1 .pricing sup {
  font-size: 18px;
  top: -20px;
}

.pricing1 .pricing .yearly {
  display: none;
}
</style>
@include('header.navbar')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('sidebar.sidebar')
<x-wrapper-component pageName="Pricing Page"
:crumbs="array('admin'=>'View Pricing')"
/>
 <!-- Main content -->
    <div class="pricing1 py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h3 class="mt-3 font-weight-medium mb-1">Pricing to make your Maternity Period a blessing</h3>
        <h6 class="subtitle">We offer 100% satisafaction and Money back Guarantee</h6>
        <div class="switcher-box mt-4 d-flex align-items-center justify-content-center">
          <span class="font-14 font-weight-medium">MONTHLY</span>
          <div class="onoffswitch position-relative mx-2">
            <input type="checkbox" name="onoffswitch1" class="onoffswitch-checkbox d-none" id="myonoffswitch1">
            <label class="onoffswitch-label d-block overflow-hidden" for="myonoffswitch1">
							<span class="onoffswitch-inner d-block"></span>
							<span class="onoffswitch-switch d-block bg-white position-absolute"></span>
						</label>
          </div>
          <span class="font-14 font-weight-medium">YEARLY</span>
        </div>
      </div>
    </div>
    <!-- Row  -->
    <div class="row mt-5">
      <!-- Column -->
      <div class="col-lg-3 col-md-6">
        <div class="card text-center card-shadow on-hover border-0 mb-4">
          <div class="card-body font-14">
            <h5 class="mt-3 mb-1 font-weight-medium">BASIC</h5>
            <h6 class="subtitle font-weight-normal">For Women who need litte care</h6>
            <div class="pricing my-3">
              <sup>shs</sup>
              <span class="monthly display-5">50,000</span>

            </div>
            <ul class="list-inline">
            <li class="d-block py-2">Weekly Reminders</li>
             <li class="d-block py-2">counselling services</li>
              <li class="d-block py-2">Doctor Appoinment includes pick ups and drop offs</li>
              <li class="d-block py-2">Emergenency Contacts</li>
              <li class="d-block py-2">Ultra Sound Scan</li>
              <li class="d-block py-2">Meal Plans</li>
              <li class="d-block py-2">24 hour help line and support</li>
              
              <li class="d-block py-2">&nbsp;</li>

            </ul>
            <div class="bottom-btn">
              <a class="btn btn-success-gradiant btn-md text-white btn-block" 
               href="{{route('subscription', 'Basic')}}">
              <span>Choose Plan</span></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Column -->
      <div class="col-lg-3 col-md-6">
        <div class="card text-center card-shadow on-hover border-0 mb-4">
          <div class="card-body font-14">
            <span class="badge badge-inverse p-2 position-absolute price-badge font-weight-normal">Popular</span>
            <h5 class="mt-3 mb-1 font-weight-medium">STANDARD</h5>
            <h6 class="subtitle font-weight-normal">For Women Who need less care</h6>
            <div class="pricing my-3">
              <sup>shs</sup>
              <span class="monthly display-5">100,000</span>

            </div>
            <ul class="list-inline">
              <li class="d-block py-2">Weekly Reminders</li>
             <li class="d-block py-2">counselling services</li>
              <li class="d-block py-2">Doctor Appoinment includes pick ups and drop offs</li>
              <li class="d-block py-2">Emergenency Contacts</li>
              <li class="d-block py-2">Ultra Sound Scan</li>
              <li class="d-block py-2">Home Nurse</li>
              <li class="d-block py-2">Monthly Check ups</li>
              <li class="d-block py-2">24 hour help line and support</li>
              <li class="d-block py-2">&nbsp;</li>
            </ul>
            <div class="bottom-btn">
              <a class="btn btn-danger-gradiant btn-md text-white btn-block"
                 href="{{route('subscription', 'Standard')}}"
               ><span>Choose Plan</span></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Column -->
      <div class="col-lg-3 col-md-6">
        <div class="card text-center card-shadow on-hover border-0 mb-4">
          <div class="card-body font-14">
            <h5 class="mt-3 mb-1 font-weight-medium">PREMIUM</h5>
            <h6 class="subtitle font-weight-normal">For Women who need alot of car</h6>
            <div class="pricing my-3">
              <sup>shs</sup>
              <span class="monthly display-5">
                150,000

               </span>
              {{-- <span class="yearly display-5">600</span>
              <small class="monthly">/mo</small>
              <small class="yearly">/yr</small>
              <span class="d-block">Save <span class="font-weight-medium">$50</span> a Year</span> --}}
            </div>
            <ul class="list-inline">
             <li class="d-block py-2">Weekly Reminders</li>
             <li class="d-block py-2">counselling services</li>
              <li class="d-block py-2">Doctor Appoinment includes pick ups and drop offs</li>
              <li class="d-block py-2">Emergenency Contacts</li>
              <li class="d-block py-2">Ultra Sound Scan</li>
              <li class="d-block py-2">Home Nurse</li>
              <li class="d-block py-2">Weekly Check ups</li>
              <li class="d-block py-2">Meal Plans  </li>
              <li class="d-block py-2">Weight measures</li>
              <li class="d-block py-2">Emergency Visits</li>
              <li class="d-block py-2">24 hour help line and support</li>
              <li class="d-block py-2">&nbsp;</li>
            </ul>
            <div class="bottom-btn">
              <a class="btn btn-success-gradiant btn-md text-white btn-block" 
                href="{{route('subscription', 'Premium')}}"
              ><span>Choose Plan</span></a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
    
  </div>
  @include('footer.footer')
  @include('helpers.scripts')
  
</body>
</html>
