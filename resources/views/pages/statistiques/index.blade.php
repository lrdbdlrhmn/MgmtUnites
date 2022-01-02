@extends('layout.master')

@push('plugin-styles')
  <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">

@endpush

@section('content')

<div class="row align-items-center justify-content-center">
  <div class="col-sm-6 grid-margin stretch-card">
    <div class="card ">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">Filter</h4>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <select class="region form-control" name="regions"
              id="region">
              @foreach ($regions as $region)
              <option value="{{ $region->id }}">{{ $region->libelle}}</option>
              @endforeach   
            </select>
          </div>
          <div class="form-group mb-3">
            <select class="bataillon form-control" name="bataillons"
              id="bataillon" >
            </select>
          </div>

        <div class="form-group mb-3">
          <select class="unite form-control" name="unites"
            id="unite">
          </select>
        </div>
        
        <button type="submit" name="execute" id="execute" class="btn btn-primary">Exécuter</button>
    </form>
      </div>
    </div>
</div>
</div>
<div class="row" id="personnel">
              <!-- /.card -->
              <div class="col-md-12 grid-margin stretch-card">
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
</div>
<div class="row" id="materiels">
  <!-- /.card -->
  <div class="col-md-12 grid-margin stretch-card">
    <!-- BAR CHART -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Matériels</h3>
  
  
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="materiel" style="height: 500px;width: 100%;"></canvas>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
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
<script type="text/javascript">
  $(document).ready(function () {
      $('#personnel').hide();    
      $('#materiels').hide();
      $('#region').on('change', function () {
          var regionId = this.value;
          $('#bataillon').html('');
          $.ajax({
              url: '{{ route('bataillons') }}?region_id='+regionId,
              type: 'get',
              success: function (res) {
                  $('#bataillon').html('');
                  $.each(res, function (key, value) {
                      $('#bataillon').append('<option value="' + value
                          .id + '">' + value.libelle + '</option>');
                  });
              }
          });
      });
      $('#bataillon').on('change', function () {
          var bataillonId = this.value;
          $('#unite').html('');
          $.ajax({
              url: '{{ route('unites') }}?bataillon_id='+bataillonId,
              type: 'get',
              success: function (res) {
                  $('#unite').html('');
                  $.each(res, function (key, value) {
                      $('#unite').append('<option value="' + value
                          .id + '">' + value.libelle + '</option>');
                  });
              }
          });
      });

      $('#unite').on('change', function () {
          $('#personnel').show();
          $('#materiels').show();
          var regionId = $('#region').val();
          var bataillonId = $('#bataillon').val();
          var uniteId = this.value;
          var personnels = [];
          var materiels = [];
          var theorique = [];
          var libelle = [];
          var realise = [];
          var tperso = [];
          var rperso = [];
          var pourcent = [];
          var tmats = [];
          var rmats = [];
          var tmateriel = [];
          var rmateriel = [];
          var lmats = [];

          $.ajax({
              url: '{{ route('anydata')}}?unites='+uniteId,
              type: 'get',
              success: function (res) {
                    materiels = res.materiels;
                    console.log(materiels);
                    tmats = materiels.theorique;
                    rmats = materiels.realise;
                    $.each(tmats,function(key,value) {
                      tmateriel.push(value);
                      lmats.push(key);
                    });
                    $.each(rmats,function(key,value) {
                      rmateriel.push(value);
                    });

                    personnels = res.personnels;
                    theorique = personnels.theorique;
                    realise = personnels.realise;
                    
                    $.each(theorique,function(key,value) {
                      tperso.push(value);
                      libelle.push(key);
                      });
                    $.each(realise,function(key,value) {
                      rperso.push(value);
                    });
                    pourcent.push([0]*100 / tperso[0]);
                    pourcent.push(rperso[1]*100 / tperso[1]);
                    pourcent.push(rperso[2]*100 / tperso[2]);
                  if (window.myChart!=undefined) {
                    window.myChart.destroy();
                  }
                  if (window.mChart!=undefined) {
                    window.mChart.destroy();
                  }
                  
                  var persoData = {
                  labels  : libelle,
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
                      data                : tperso,
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
                      data                : rperso,
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
                      data                : pourcent,
                    }

                  ]
                }
               
                var barChartCanvas = $('#perso').get(0).getContext('2d')
                //var barChartData = $.extend(false, {}, persoData)
                barChartCanvas.hight = 500;
                var barChartOptions = {
                  responsive              : true,
                  maintainAspectRatio     : true,
                  datasetFill             : true
                }
                window.myChart = new Chart(barChartCanvas, {
                  type: 'bar',
                  data: persoData,
                  options: barChartOptions
                });

                var materielsData = {
                  labels  : lmats,
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
                      data                : tmateriel
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
                      data                : rmateriel
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
                      data                : rmateriel
                    },
                  ]
                }

                  var stackedBarChartCanvas = $('#materiel').get(0).getContext('2d')
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

                    window.mChart = new Chart(stackedBarChartCanvas, {
                      type: 'bar',
                      data: materielsData,
                      options: stackedBarChartOptions
                    });



                
              }
          });
      });

      
  });
  </script>
  @endpush