@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->

@endpush

@section('content')

<div class="row"></div>
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-office-building text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total d'unités</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $unites }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total de personels</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$personne}}</h3>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-car text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total de Matériels</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$piece}}</h3>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-bomb text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Qualifications</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $qua }}</h3>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 pr-5 border-bottom bg-light d-sm-flex justify-content-between">
        <h4 class="card-title mb-0">Unité par Region</h4>
      </div>
      <div class="card-body d-flex flex-column">
        <canvas class="my-auto" id="doughnutChart" height="300"></canvas>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-lg-6 grid-margin stretch-card">
  <div class="card">
    <div class="p-4 pr-5 border-bottom bg-light d-sm-flex justify-content-between">
      <h4 class="card-title mb-0">Unité par Bataillon</h4>
    </div>
    <div class="card-body d-flex">
      <canvas class="my-auto" id="pieChart" height="100"></canvas>
    
    </div>
  </div>
</div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">Bataillon Par Region</h4>
        <div id="doughnut-chart-legend" class="mr-4" style="font-size : 10px"></div>
      </div>
      <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-center pb-4">
          <h4 class="card-title mb-0"></h4>
          <div id="bar-traffic-legend"></div>
        </div>
        <canvas id="barChart" height="150"></canvas>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}  
<script>
      var rgb = [];
      var reg = JSON.parse(`<?php echo $reg; ?>`);
      var bata = JSON.parse(`<?php echo $bata; ?>`);
      var bat = JSON.parse(`<?php echo $bat; ?>`);
      var unite = JSON.parse(`<?php echo $unite; ?>`);
      var bataillons = JSON.parse(`<?php echo $bataillons; ?>`);
      var labels1 = [];
      var data1 = [];
      console.log(bataillons.libelle);
      for (let i = 0; i < bataillons.length; i++) {
        labels1[i] = bataillons[i].libelle;
        data1[i] = bataillons[i].unites_par_region;
      }


      /*color =  [];
      for(var i = 0; i < unite.length; i++)
        {
        color.push('rgb('+ Math.floor(Math.random() * 255) + ',' +Math.floor(Math.random() * 255) + ',' +Math.floor(Math.random() * 255) + ')');
        }
      */
      if ($("#doughnutChart").length) {
        var doughnutChartCanvas = $("#doughnutChart")
            .get(0)
            .getContext("2d");
        var doughnutPieData = {
            datasets: [
                {
                    data: data1,
                    backgroundColor: colors,
                    borderColor: colors
                }
            ],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: labels1
        };
        var doughnutPieOptions = {
            cutoutPercentage: 75,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            showScale: true,
            legend: false,
            legendCallback: function(chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul>');
                for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                    text.push(
                        '<li><span style="background-color:' +
                            chart.data.datasets[0].backgroundColor[i] +
                            '">'
                    );
                    text.push("</span>");
                    if (chart.data.labels[i]) {
                        text.push(chart.data.labels[i]);
                    }
                    text.push("</li>");
                }
                text.push("</div></ul>");
                return text.join("");
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            }
        };
        var doughnutChart = new Chart(doughnutChartCanvas, {
            type: "doughnut",
            data: doughnutPieData,
            options: doughnutPieOptions
        });
        
    }
      if ($("#barChart").length) {
        var barChartCanvas = $("#barChart")
            .get(0)
            .getContext("2d");

        var barChart = new Chart(barChartCanvas, {
            type: "bar",
            data: {
                labels: reg,
                datasets: [
                    {
                        label: "",
                        data: bata,
                        backgroundColor: colors[1],
                        borderColor: colors[1],
                        borderWidth: 0
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                              
                                fontColor: chartFontcolor,
                                fontSize: 12,
                                lineHeight: 2
                            },
                            ticks: {
                                fontColor: chartFontcolor,
                                stepSize: 10,
                                min: 0,
                                max: 150,
                                autoSkip: true,
                                autoSkipPadding: 15,
                                maxRotation: 0,
                                maxTicksLimit: 10
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false,
                                color: chartGridLineColor,
                                zeroLineColor: chartGridLineColor
                            }
                        }
                    ],
                    yAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                
                                fontColor: chartFontcolor,
                                fontSize: 12,
                                lineHeight: 2
                            },
                            ticks: {
                                display: true,
                                autoSkip: false,
                                maxRotation: 0,
                                fontColor: chartFontcolor,
                                stepSize: 1,
                                min: 0,
                                max: 4
                            },
                            gridLines: {
                                drawBorder: false,
                                color: chartGridLineColor,
                                zeroLineColor: chartGridLineColor
                            }
                        }
                    ]
                },
                legend: {
                    display: false
                },
                legendCallback: function(chart) {
                    var text = [];
                    text.push('<div class="chartjs-legend"><ul>');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                        text.push("<li>");
                        text.push(
                            '<span style="background-color:' +
                                chart.data.datasets[i].backgroundColor +
                                '">' +
                                "</span>"
                        );
                        text.push(chart.data.datasets[i].label);
                        text.push("</li>");
                    }
                    text.push("</ul></div>");
                    return text.join("");
                },
                elements: {
                    point: {
                        radius: 0
                    }
                }
            }
        });

    }

    if ($("#pieChart").length) {
        var pieChartCanvas = $("#pieChart")
            .get(0)
            .getContext("2d");
        var pieChart = new Chart(pieChartCanvas, {
            type: "pie",
            data: {
                datasets: [
                    {
                        data: unite,
                        backgroundColor: colors,
                        
                    }
                ],
                labels: bat
            },
            options: {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                legend: {
                    display: false
                },
                legendCallback: function(chart) {
                    var text = [];
                    text.push('<div class="chartjs-legend"><ul>');
                    for (
                        var i = 0;
                        i < chart.data.datasets[0].data.length;
                        i++
                    ) {
                        text.push(
                            '<li><span style="background-color:' +
                                chart.data.datasets[0].backgroundColor[i] +
                                '">'
                        );
                        text.push("</span>");
                        if (chart.data.labels[i]) {
                            text.push(chart.data.labels[i]);
                        }
                        text.push("</li>");
                    }
                    text.push("</div></ul>");
                    return text.join("");
                }
            }
        });
        document.getElementById(
            "pie-chart-legend"
        ).innerHTML = pieChart.generateLegend();
    }

</script>
@endpush