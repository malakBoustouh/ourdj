@extends('layouts.admin')

@section('content')
    <head>

        <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('https://www.gstatic.com/charts/loader.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style type="text/css">
            .box{
                width:800px;
                margin:0 auto;
            }
        </style>
        <script type="text/javascript">
            var analytics = <?php echo $sexe; ?>

            google.charts.load('current', {'packages':['corechart']});

            google.charts.setOnLoadCallback(drawChart);

            function drawChart()
            {
                var data = google.visualization.arrayToDataTable(analytics);
                var options = {
                    title : 'النسبة المئوية للاناث و الذكور'
                };
                var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            var anal= <?php echo $niveau; ?>

            google.charts.load('current', {'packages':['corechart']});

            google.charts.setOnLoadCallback(drawChart);

            function drawChart()
            {
                var da = google.visualization.arrayToDataTable(anal);
                var options = {
                    title : 'النسبة المئوية لمستويات التوحد'
                };
                var chart = new google.visualization.PieChart(document.getElementById('pie'));
                chart.draw(da, options);
            }
        </script>
        <script type="text/javascript">
            var analyts = <?php echo $year; ?>

            google.charts.load('current', {'packages':["corechart"]});

            google.charts.setOnLoadCallback(drawChart);

            function drawChart()
            {

                var dat = google.visualization.arrayToDataTable(analyts);

                var options = {
                    title : 'احصائيات السنوية لمرضى التوحد'
                };
                var chart = new google.visualization.LineChart(document.getElementById('chart'));
                chart.draw(dat, options);
            }
        </script>
        <script type="text/javascript">
            var analytsAge = <?php echo $range; ?>

            google.charts.load('current', {'packages':['annotationchart']});

            google.charts.setOnLoadCallback(drawChart);

            function drawChart()
            {
                var datAge = google.visualization.arrayToDataTable(analytsAge);

                var options = {
                    title : 'احصائيات اعمار مرضى التوحد'
                };
                var chartAge = new google.visualization.BarChart(document.getElementById('chartAge'));
                chartAge.draw(datAge, options);
            }
        </script>


    </head>
    <body>
    <br />
    <div class="container">
        <h3 align="center">احصائيات</h3><br />

        <div class="panel panel-default">

                <div class="row">
                    <div class="card-body">

                    <div class="col-md-6">
                        <div id="pie_chart" style="width:550px; height:550px;margin-right: 50px;margin-top: 100px;"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="pie" style="width:550px; height:550px;margin-right:-09px;margin-top: 100px;"></div>
                    </div></div>
                </div></div>

            <div class="panel-body" align="center">
                <div id="chart" style="width: 100%; height: 600px;"></div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
<div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-body" align="center">
                        <div id="chartAge" style="width: 100%; height: 600px;"></div>
                    </div>
                </div>
            </div>



        </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}


@endsection
