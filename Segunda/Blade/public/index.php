<?php
require '../vendor/autoload.php';
use Philo\Blade\Blade;
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);
// Your data for the view
$familias = [
    (object)['cod' => '001', 'nombre' => 'Family 1'],
    (object)['cod' => '002', 'nombre' => 'Family 2'],
    // Add more data as needed
];

// Render the Blade view
echo $blade->view()->make('viewFamilias', ['familias' => $familias, 'titulo' => 'Lista de Familias', 'encabezado' => 'Familias Disponibles'])->render();
?>
