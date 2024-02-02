<?php
require '../vendor/autoload.php';

use Windwalker\Edge\Edge;
use Windwalker\Edge\Loader\EdgeFileLoader;

$views = ['./views'];
$cache = '../cache';

$titulo = "titulo";
$contenido = "contenido";

$data = array($titulo, $contenido);

$blade = new Edge(new EdgeFileLoader());

echo $blade->render('/Segunda/Blade/views/layout', $data);