@extends('layouts.adminmain')

@section('content')

<div class="row">
@include('layouts.totalrevnue')
<div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-credit-card"></i> Transaction List : 
                  @if( !empty($option) ) 
                  {{ $option }}
                  @endif </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item transaction-chart" id="today" href="/transaction/today">Today</a>
                      <a class="dropdown-item transaction-chart" id="yesterday" href="/transaction/yesterday">Yesterday</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item transaction-chart" id="thisweek" href="/transaction/thisweek">This Week</a>
                      <a class="dropdown-item transaction-chart" id="lastweek" href="/transaction/lastweek">Last Week</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item transaction-chart" id="thismonth" href="/transaction/thismonth">This Month</a>
                      <a class="dropdown-item transaction-chart" id="lastmonth" href="/transaction/lastmonth">Last Month</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="transactionTable">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>Paid amount</th>
                            <th>Paid date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction as $key=>$trans)
                        <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $trans['ord_id'] }}</td>
                        <td>{{ $trans['user_id'] }}</td>
                        <td>
                        @if($trans['paid_currency'] == 'INR')
                        <b>&#8377;</b> {{ $trans['paid_amount'] }}
                        @elseif($trans['paid_currency'] == 'CNY')
                        <b>&#165;</b> {{ $trans['paid_amount'] }}
                        @elseif($trans['paid_currency'] == 'AED')
                        <b>&#x62f;&#x2e;&#x625;</b> {{ $trans['paid_amount'] }}
                        @else
                            <b>$</b> {{ $trans['paid_amount'] }}
                        @endif
                    </td>
                        <td>{{ $trans['paid_date'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

 <div class="col-xl-4 col-lg-5">
 <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-chart-bar"></i> Revenue Chart</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myPieChart" width="301" height="245" class="chartjs-render-monitor" style="display: block; width: 301px; height: 245px;"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Added to Cart
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Success
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Failed
                    </span>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-chart-bar"></i> Revenue - Country wise</h6>
                </div>
          <div class="card-body">
                  <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myPieChart2" width="301" height="245" class="chartjs-render-monitor" style="display: block; width: 301px; height: 245px;"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> INR
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> USD
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> AED
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> CNY
                    </span>
                  </div>
                </div> <!---->
        </div>
 </div>
 
 
 </div>
@endsection

@section('scripts')


<script type="text/javascript">
$(document).ready(function(){
  
@if(!empty($option) )

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Added to cart", "Success", "Failed"],
    datasets: [{
      data: [{{$chart['addedtocart']}}, {{$chart['success']}}, {{$chart['failed']}}],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


var ctx2 = document.getElementById("myPieChart2");
var myPieChart2 = new Chart(ctx2, {
  type: 'doughnut',
  data: {
    labels: ["INR", "USD", "AED", "CNY"],
    datasets: [{
      data: [{{ $total_revenue_count['total_revenue_INR'] }}, {{ $total_revenue_count['total_revenue_USD'] }}, {{ $total_revenue_count['total_revenue_AED'] }}, {{ $total_revenue_count['total_revenue_CNY'] }}],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#f5b924'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#f6c23e'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
@endif



  $('.transaction-chart').on('click', function(event) {
    var temp_id = this.id;
   
    $.ajax({
    type : "GET",
    url  : '/transaction/chart',
    data : {"_token": "{{ csrf_token() }}",
        "id": temp_id},
    cache: false,
    async: true,
    success : function(response){
      //alert("inside the response !!! "+response);

      var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Added to cart", "Success", "Failed"],
    datasets: [{
      data: [response.addedtocart, response.success, response.failed],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


      
    }
    }); 
  });

});
</script>
@endsection