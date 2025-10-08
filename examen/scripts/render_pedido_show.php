<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Pedidos;

$pedido = Pedidos::first();
if(!$pedido) { echo "NO_PEDIDO"; exit; }
$view = view('pedidos.show', ['pedido' => $pedido])->render();
echo $view;