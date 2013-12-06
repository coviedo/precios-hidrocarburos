<?php
include('src/preciosfuel.php');

$fuel = new PreciosFuel();

echo $fuel->getResource(); //Resultado con los precios de los hidrocarburos;
