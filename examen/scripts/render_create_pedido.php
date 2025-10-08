<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Http\Controllers\PedidosController;

$controller = new PedidosController();
$resp = $controller->create();
// The controller returns a view instance; render it
echo $resp->render();
