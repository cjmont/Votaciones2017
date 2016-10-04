<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Elecciones Ecuador 2017</title>



        <link rel="stylesheet" href="css/bootstrap.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    //llamada a visualizar en la tabla de datos
    $(document).ready(function() {
        Highcharts.visualize = function(table, options) {
            //categorias
            options.xAxis.categories = [];
            $('tbody th', table).each( function(i) {
                options.xAxis.categories.push(this.innerHTML);
            });
    
            // serie de datos
            options.series = [];
            $('tr', table).each( function(i) {
                var tr = this;
                $('th, td', tr).each( function(j) {
                    if (j > 0) { // primera columna
                        if (i == 0) { // obtiene el nombre y la serie
                            options.series[j - 1] = {
                                name: this.innerHTML,
                                data: []
                            };
                        } else { // agrega valores
                            options.series[j - 1].data.push(parseFloat(this.innerHTML));
                        }
                    }
                });
            });
    
            var chart = new Highcharts.Chart(options);
        }
    
        var table = document.getElementById('datatable'),
        options = {
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Resultados'
            },
            xAxis: {
            },
            yAxis: {
                title: {
                    text: 'Numero de Votos'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.y +' '+ 'votos';
                }
            }
        };
    
        Highcharts.visualize(table, options);
    });
    
});
		</script>
	</head>
	<body>


  

<div class = "panel panel-primary" class="form-group" class="page-header" class="panel panel-primary" style="width:600px; margin:0 auto;">
<script src="highcharts.js"></script>
<script src="exporting.js"></script>

<div class="panel-body" id="container" style="width: 400px; height: 400px; margin: 0pt 20px 0pt auto; float:left"></div>
<div class="panel-body" style="float:right; width:180px; height:auto;">
 <div class = "panel-heading">
      <h3> <small>Candidatos mas importantes</small></h3>
   </div>

<br>
<table class="table" border="1" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th>Candidatos</th>
			<th>Gillermo Lasso<img src="fotos/guillermo.jpg" width="75" height="86" /></th>
			<th>Lenin Moreno<img src="fotos/lenin.jpg" width="80" height="95" /></th>
            <th>Paco Moncayo<img src="fotos/paco.jpg" width="75" height="86" /></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Votos</th>
			<?php
			include('config.php');
			$sql=mysql_query("SELECT * FROM vote");
			while($row=mysql_fetch_array($sql))
			{
			echo '<td>'.$row['vote'].'</td>';
			}
			?>
		</tr>
        
	</tbody>
</table>
<br>Por quien votarias para nuevo presidente del Ecuador?</br>
<br></br>
<form class="form-inline" class="radio" action="controlador.php" method="post">
  <label>
  <input  name="radiobutton" type="radio" value="1">Gillermo Lasso
  </label><br><label>
  <input name="radiobutton" type="radio" value="2">Lenin Moreno </label><br>
  <input name="radiobutton" type="radio" value="3">Paco Moncayo </label><br>
  <br></br>
  <input class="btn btn-primary" name="" type="submit" value="Votar!">
</form>
</div>
</div>
 </div>
	</body>
</html>
