<?php

//Creo los arreglos para las monedas y su cambios respectivos
$monedas = Array("Euros", "Dólares", "Francos Suizos", "Libras", "Pesetas", "bitcoin");
$conversion = Array(1, 1.1139, 1.107, 0.7679, 0.0060101210, 7152, 23);

//Función para obtener el dropdown menu con el arreglo de monedas
function obtenerDivisas() {
	global $monedas;
	for($i=0; $i<count($monedas); $i++ ) {
		echo "<option value=".$i.">$monedas[$i]</option>";
	}
}

//Declaración de variables
$cantidad = $_POST['cantidad'];
$indice_o = $_POST['origen'];
$indice_d = $_POST['destino'];

//Impresión de conversión
echo "Cantidad: ".$cantidad."</br>";
echo "Moneda origen: ".$monedas[ $indice_o ]."</br>";
echo "Moneda destino: ".$monedas[ $indice_d ]."</br>";

$conversion = $cantidad * $conversion[ $indice_o] / $conversion[ $indice_d];

echo "Conversion: ". $conversion. "</br>";

echo $cantidad." ".$monedas[ $indice_o ]." corresponden con ".
	 $conversion." ".$monedas[ $indice_d ].".</br>";

?>