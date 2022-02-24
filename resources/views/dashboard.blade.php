@extends('layouts.backend')

@section('title','Dashboard')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Dashboard
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Welcome, everything looks great.
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                  <a target="blank" href="{{route('generate_pdf')}}" class="btn btn-primary mb-4">Generate Book PDF</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <p class="mb-0">
            {{ session()->get('success') }}
          </p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if(session()->has('failed'))
        <div class="alert alert-warning alert-dismissible" role="alert">
          <p class="mb-0">
            {{ session()->get('failed') }}
          </p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
     
      <!-- Statistics -->
      <div class="row">
        <div class="col-xl-8 col-xxl-9 d-flex flex-column">
          <!-- Earnings Summary -->
          <div class="block block-rounded flex-grow-1 d-flex flex-column">
            <div class="block-header block-header-default">
              <h3 class="block-title">How many words you wrote on the Chapter page</h3>
            </div>
            <div class="block-content block-content-full flex-grow-1 d-flex align-items-center">
              <!-- Earnings Chart Container -->
              <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
              <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
              <canvas id="js-chartjs-earnings"></canvas>
            </div>
            <div class="block-content bg-body-light">
              <div class="row items-push text-center w-100">
                <div class="col-sm-4">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                      <i class="fa fa-caret-up fs-base text-success"></i>
                      <span>25</span>
                    </dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">Words/Week</dd>
                  </dl>
                </div>
                <div class="col-sm-4">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                      <i class="fa fa-caret-up fs-base text-success"></i>
                      <span>50</span>
                    </dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">Words/Month</dd>
                  </dl>
                </div>
                <div class="col-sm-4">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                      <i class="fa fa-caret-down fs-base text-danger"></i>
                      <span>199</span>
                    </dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">Words/Year</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <!-- END Earnings Summary -->
        </div>
      </div>
      <!-- END Statistics -->

        {{-- <div class="row row-deck"> --}}
            {{-- <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Welcome</h3>
                    </div>
                    <div class="block-content fs-sm text-muted">
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, Nascetur Pellentesque Ridules mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                        </p>
                        <p>
                            Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis
                        </p>
                        <p>
                            <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</strong>
                        </p>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="col-xl-6">
                <!-- Lines Chart -->
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Lines</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content block-content-full text-center">
                    <div class="py-3">
                      <!-- Lines Chart Container -->
                      <canvas id="js-chartjs-lines"></canvas>
                    </div>
                  </div>
                </div>
                <!-- END Lines Chart -->
              </div>
              
              <div class="col-xl-6">
                <!-- Radar Chart -->
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Radar</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content block-content-full text-center">
                    <div class="py-3 px-xxl-7">
                      <!-- Radar Chart Container -->
                      <canvas id="js-chartjs-radar"></canvas>
                    </div>
                  </div>
                </div>
                <!-- END Radar Chart -->
              </div> --}}
        {{-- </div> --}}
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
<script src="{{asset('js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{asset('js/plugins/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('js/plugins/chart.js/Chart.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('js/pages/be_comp_charts.min.js')}}"></script>

 <!-- Page JS Plugins -->

 <!-- Page JS Code -->
 <script src="{{asset('js/pages/be_pages_dashboard.min.js')}}"></script>
<!-- Page JS Helpers (Easy Pie Chart + jQuery Sparkline Plugins) -->
<script>One.helpersOnLoad(['jq-easy-pie-chart', 'jq-sparkline']);</script>
@endsection()