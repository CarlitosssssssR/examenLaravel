<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Pedidos;
use App\Http\Controllers\PedidosController;

$pedido = Pedidos::first();
if(!$pedido) { echo "NO_PEDIDO"; exit; }
$controller = new PedidosController();
$view = $controller->edit($pedido);
echo $view->render();
