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
     
      <div class="row row-deck">
        <div class="col-sm-6 col-xxl-3">
          <div class="block block-rounded d-flex flex-column">
            <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
              <dl class="mb-0">
                <dt class="fs-3 fw-bold">32</dt>
                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Pending Orders</dd>
              </dl>
              <div class="item item-rounded-lg bg-body-light">
                <i class="far fa-gem fs-3 text-primary"></i>
              </div>
            </div>
            <div class="bg-body-light rounded-bottom">
              <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>View all orders</span>
                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
              </a>
            </div>
          </div>
          <!-- END Pending Orders -->
        </div>
        <div class="col-sm-6 col-xxl-3">
          <!-- New Customers -->
          <div class="block block-rounded d-flex flex-column">
            <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
              <dl class="mb-0">
                <dt class="fs-3 fw-bold">124</dt>
                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">New Customers</dd>
              </dl>
              <div class="item item-rounded-lg bg-body-light">
                <i class="far fa-user-circle fs-3 text-primary"></i>
              </div>
            </div>
            <div class="bg-body-light rounded-bottom">
              <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>View all customers</span>
                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
              </a>
            </div>
          </div>
          <!-- END New Customers -->
        </div>
        <div class="col-sm-6 col-xxl-3">
          <!-- Messages -->
          <div class="block block-rounded d-flex flex-column">
            <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
              <dl class="mb-0">
                <dt class="fs-3 fw-bold">45</dt>
                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Messages</dd>
              </dl>
              <div class="item item-rounded-lg bg-body-light">
                <i class="far fa-paper-plane fs-3 text-primary"></i>
              </div>
            </div>
            <div class="bg-body-light rounded-bottom">
              <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>View all messages</span>
                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
              </a>
            </div>
          </div>
          <!-- END Messages -->
        </div>
        <div class="col-sm-6 col-xxl-3">
          <!-- Conversion Rate -->
          <div class="block block-rounded d-flex flex-column">
            <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
              <dl class="mb-0">
                <dt class="fs-3 fw-bold">4.5%</dt>
                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Conversion Rate</dd>
              </dl>
              <div class="item item-rounded-lg bg-body-light">
                <i class="fa fa-chart-bar fs-3 text-primary"></i>
              </div>
            </div>
            <div class="bg-body-light rounded-bottom">
              <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>View statistics</span>
                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
              </a>
            </div>
          </div>
          <!-- END Conversion Rate-->
        </div>
      </div>
      <!-- END Overview -->

      <!-- Statistics -->
      <div class="row">
        <div class="col-xl-8 col-xxl-9 d-flex flex-column">
          <!-- Earnings Summary -->
          <div class="block block-rounded flex-grow-1 d-flex flex-column">
            <div class="block-header block-header-default">
              <h3 class="block-title">Earnings Summary</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option">
                  <i class="si si-settings"></i>
                </button>
              </div>
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
                      <span>2.5%</span>
                    </dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">Customer Growth</dd>
                  </dl>
                </div>
                <div class="col-sm-4">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                      <i class="fa fa-caret-up fs-base text-success"></i>
                      <span>3.8%</span>
                    </dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">Page Views</dd>
                  </dl>
                </div>
                <div class="col-sm-4">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                      <i class="fa fa-caret-down fs-base text-danger"></i>
                      <span>1.7%</span>
                    </dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">New Products</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <!-- END Earnings Summary -->
        </div>
        <div class="col-xl-4 col-xxl-3 d-flex flex-column">
          <!-- Last 2 Weeks -->
          <!-- Chart.js Charts is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
          <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
          <div class="row row-deck flex-grow-1">
            <div class="col-md-6 col-xl-12">
              <div class="block block-rounded d-flex flex-column">
                <div class="block-content flex-grow-1 d-flex justify-content-between">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">570</dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">Total Orders</dd>
                  </dl>
                  <div>
                    <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-danger bg-danger-light">
                      <i class="fa fa-caret-down me-1"></i>
                      2.2%
                    </div>
                  </div>
                </div>
                <div class="block-content p-1 text-center overflow-hidden">
                  <!-- Total Orders Chart Container -->
                  <canvas id="js-chartjs-total-orders" style="height: 90px;"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-12">
              <div class="block block-rounded d-flex flex-column">
                <div class="block-content flex-grow-1 d-flex justify-content-between">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">$5,234.21</dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">Total Earnings</dd>
                  </dl>
                  <div>
                    <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                      <i class="fa fa-caret-up me-1"></i>
                      4.2%
                    </div>
                  </div>
                </div>
                <div class="block-content p-1 text-center overflow-hidden">
                  <!-- Total Earnings Chart Container -->
                  <canvas id="js-chartjs-total-earnings" style="height: 90px;"></canvas>
                </div>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="block block-rounded d-flex flex-column">
                <div class="block-content flex-grow-1 d-flex justify-content-between">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">264</dt>
                    <dd class="fs-sm fw-medium text-muted mb-0">New Customers</dd>
                  </dl>
                  <div>
                    <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                      <i class="fa fa-caret-up me-1"></i>
                      9.3%
                    </div>
                  </div>
                </div>
                <div class="block-content p-1 text-center overflow-hidden">
                  <!-- New Customers Chart Container -->
                  <canvas id="js-chartjs-new-customers" style="height: 90px;"></canvas>
                </div>
              </div>
            </div>
          </div>
          <!-- END Last 2 Weeks -->
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