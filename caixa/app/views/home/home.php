<?php if ( ! defined('URL_BASE')) exit; ?>

<div class="wrap">

<div class="graficos" style="display:flex;">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
		function TodasEntradas(){
		let resultado = 0;
		for(let n = 0; n < entradaValues.length; n++){
			resultado = resultado + entradaValues[n];
		}
		return resultado;
	}

	function TodasSaidas(){
		let resultado = 0;
		for(let n = 0; n < saidaValues.length; n++){
			resultado = resultado + saidaValues[n];
		}
		return resultado;
	}

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Entrada',     TodasEntradas()],
          ['Saída',      TodasSaidas()],
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

		function Entrada(){
			entradaValues.shift();
			return entradaValues[0];
		}

		function Saida(){
			saidaValues.shift();
			return saidaValues[0];
		}

		for(let c = 0; c < Math.ceil((values.length)/2); c++){
			year.shift();
		}

		function Ano() {
			return year[0];
		}

        var data = google.visualization.arrayToDataTable([
          ['Ano', 'Entrada', 'Saída'],
          [Ano(), Entrada(), Saida()],
        ]);

			
		for(let count = 0; count < values.length; count++){
			data.Wf.push({c: [{v: Ano()}, {v: Entrada()}, {v: Saida()}]});
			values.shift();
		}

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Ano',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


	<div id="chart_div" style="width: 100%; height: 500px;"></div>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
			
</script>


	<div>
		<div id="chart_div" style="width: 50%; height: 500px;"></div>
	</div>
	<div>
		<div id="piechart_3d" style="width: 10%; height: 500px;align-self:flex-end;"></div>
	</div>
</div>

	<?php
		$arrayValues = [];
		$arrayInputOutput = [];
		
		foreach($data['moviments'] AS $moviment){

			array_push($arrayValues, $moviment['value']);

			if($moviment['type']=="input"){
				array_push($arrayInputOutput, '*');
			}else{
				array_push($arrayInputOutput, '-');
			}
		}

		echo "<p class='value' style='display:none;'>";
		print_r($arrayValues);
		echo "</p>";

		echo "<p class='input' style='display:none;'>";
		print_r($arrayInputOutput);
		echo "</p>";

		$arrayDates = [];

		foreach($data['moviments'] AS $moviment){
			array_push($arrayDates, $moviment['date']);
		}

		echo "<p class='date' style='display:none;'>";
		print_r($arrayDates);
		echo "</p>";

	?>

	<script src="app\views\js\addValues.js"></script>



</div> 