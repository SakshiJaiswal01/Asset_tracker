@extends('admin.dashboard')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           <?php echo $chartData?>
        ]);
        var options = {
          title: 'Products Available',
          is3D:true
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  @section('sakshi')
    <div id="piechart" style="width: 900px; height: 500px; margin-left:100px;"></div>
    @endsection
  </body>
</html>