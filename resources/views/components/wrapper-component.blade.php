  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">{{ $page_name }}</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          @foreach ($crumbs as $key => $value)
                          @if(next($crumbs) === false)
                          <li class="breadcrumb-item active">{{ $value }}</li>
                            @else
                          <li class="breadcrumb-item"><a href="{{route($key)}}">{{ $value }}</a></li>
                            @endif


                          @endforeach
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
