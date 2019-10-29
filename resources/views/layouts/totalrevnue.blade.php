<!-- top cards-->
<div class="col-xl-12 col-lg-12">
<div class="card-group mb-4">

<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
              <a class="dropdown-item transaction-chart" id="today" href="/transaction/today">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      @if(!empty($total_revenue_count))
                      &#8377;{{ $total_revenue_count['total_revenue_today'] }}
                      @endif
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
  </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
              <a class="dropdown-item transaction-chart" id="yesterday" href="/transaction/yesterday">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Yesterday</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      @if(!empty($total_revenue_count))
                      &#8377;{{ $total_revenue_count['total_revenue_yesterday'] }}
                      @endif
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
              <a class="dropdown-item transaction-chart" id="thisweek" href="/transaction/thisweek">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This week</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                      @if(!empty($total_revenue_count))
                      &#8377;{{ $total_revenue_count['total_revenue_this_week'] }}
                      @endif
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
              <a class="dropdown-item transaction-chart" id="lastweek" href="/transaction/lastweek">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Last week</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      @if(!empty($total_revenue_count))
                      &#8377;{{ $total_revenue_count['total_revenue_last_week'] }}
                      @endif
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
              <a class="dropdown-item transaction-chart" id="thismonth" href="/transaction/thismonth">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">This month</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      @if(!empty($total_revenue_count))
                      &#8377;{{ $total_revenue_count['total_revenue_this_month'] }}
                      @endif
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
              <a class="dropdown-item transaction-chart" id="lastmonth" href="/transaction/lastmonth">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Last month</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      @if(!empty($total_revenue_count))
                      &#8377;{{ $total_revenue_count['total_revenue_last_month'] }}
                      @endif
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            

</div>
</div>
<!-- top cards ends here-->