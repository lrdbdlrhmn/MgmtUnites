@extends('layout.master')

@push('plugin-styles')
  <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">

@endpush

@section('content')

<div class="row">

            <!-- /.card -->
            <div class="col-md-6 grid-margin stretch-card">
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Personnels</h3>


              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="perso" style="height: 500px;width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>


  <!-- /.card -->
  <div class="col-md-6 grid-margin stretch-card">
  <!-- BAR CHART -->
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Trans</h3>


    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="trans" style="height: 500px;width: 100%;"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
</div>
<div class="row">
  
</div>

@endsection
@push('plugin-scripts')
  <!-- jQuery -->
<script src="{{ asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('js/Chart.min.js')}}"></script>

<script src="{{ asset('js/select2.min.js')}}"></script>

@endpush
@push('custom-scripts')
<script>


    $(document).ready(function() {
        
        // Select2 Multiple
        $('.region').select2();
        $('.bataillon').select2();
        $('.unite').select2();

    });

</script>

<script>
  var perso = JSON.parse(`<?php echo $tpersos; ?>`);
  
   var persoData = {
      labels  : ['Officiers', 'Sous-officiers', 'HDT'],
      datasets: [
        {
          label               : 'T',
          backgroundColor     : '#00a65a',
          borderColor         : '#00a65a',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#00a65a',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#00a65a',
          data                : perso
        },
        {
          label               : 'R',
          backgroundColor     : '#f39c12',
          borderColor         : '#f39c12',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#f39c12',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f39c12',
          data                : [82, 58, 84]
        },
        {
          label               : '%',
          backgroundColor     : '#f56954',
          borderColor         : '#f56954',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#f56954',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f56954',
          data                : [2, 10, 16]
        }

      ]
    }

    var autoData = {
      labels  : ['VL', 'EB', 'PL'],
      datasets: [
        {
          label               : 'T',
          backgroundColor     : '#00a65a',
          borderColor         : '#00a65a',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#00a65a',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#00a65a',
          data                : [82, 68, 70]
        },
        {
          label               : 'R',
          backgroundColor     : '#f39c12',
          borderColor         : '#f39c12',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#f39c12',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f39c12',
          data                : [70, 58, 65]
        },
        {
          label               : '%',
          backgroundColor     : '#f56954',
          borderColor         : '#f56954',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#f56954',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f56954',
          data                : [12, 10, 5]
        }
      ]
    }

    var transData = {
      labels  : ['VHF', 'HF', 'UHF'],
      datasets: [
        {
          label               : 'T',
          backgroundColor     : '#00a65a',
          borderColor         : '#00a65a',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#00a65a',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#00a65a',
          data                : [82, 68, 70]
        },
        {
          label               : 'R',
          backgroundColor     : '#f39c12',
          borderColor         : '#f39c12',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#f39c12',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f39c12',
          data                : [28, 48, 40]
        },
        {
          label               : '%',
          backgroundColor     : '#f56954',
          borderColor         : '#f56954',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#f56954',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f56954',
          data                : [28, 48, 40]
        }
      ]
    }

    var armementData = {
      labels  : ['PA', 'FA', 'LR2','RPK','PKMS','CQI','CSLM3 12,7','LG3','RPG7','14,5'],
      datasets: [
        {
          label               : 'T',
          backgroundColor     : '#00a65a',
          borderColor         : '#00a65a',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#00a65a',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#00a65a',
          data                : [28, 48, 40, 19, 86, 27, 90, 48, 40, 19]
        },
        {
          label               : 'R',
          backgroundColor     : '#f39c12',
          borderColor         : '#f39c12',
          pointRadius         : false,
          pointColor          : '#f39c12',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f39c12',
          data                : [65, 59, 80, 81, 56, 55, 40, 48, 40, 19]
        },
        {
          label               : '%',
          backgroundColor     : '#f56954',
          borderColor         : '#f56954',
          pointRadius         : false,
          pointColor          : '#f56954',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f56954',
          data                : [65, 59, 80, 81, 56, 55, 40, 48, 40, 19]
        },
      ]
    }
    

  $(function () {

    var barChartCanvas = $('#perso').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, persoData)
    var temp0 = persoData.datasets[0]
    var temp1 = persoData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  });

  $(function () {
    
    var barChartCanvas = $('#auto').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, autoData)
    var temp0 = autoData.datasets[0]
    var temp1 = autoData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  });

  $(function () {
    
    var barChartCanvas = $('#trans').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, transData)
    var temp0 = transData.datasets[0]
    var temp1 = transData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  });


  var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
  var stackedBarChartData = $.extend(true, {}, armementData)

  var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    });
  </script>
  @endpush