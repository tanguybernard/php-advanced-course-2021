<?php
namespace Course\App\Bash;

use App\HelloWorld;

require_once __DIR__ .'/../../vendor/autoload.php';

echo HelloWorld::world().PHP_EOL;