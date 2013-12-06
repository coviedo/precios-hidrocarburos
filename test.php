<?php
include('src/PrecioFuel.php');

$fuel = new PreciosFuel();

echo $fuel->getResource(); //Resultado con los precios de los hidrocarburos;