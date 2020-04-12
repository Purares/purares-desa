<h1>RESULTADOS2:</h1>
<br>
<br>




<h1>pruebas</h1>

<?php 

$tabla=ControladorFormularios::ctrImprimirStockCarnes();
$largo=count($tabla['Tocino']['desposte']);
$dato=$tabla['Tocino']['desposte'][0];
$dato2=$tabla['Tocino']['stockactual'][0];


var_dump($dato);
var_dump($dato2);

var_dump($largo);
var_dump($tabla);

?>