<?php
namespace Course\App\Bash;

use App\HelloWorld as MyExternalHelloWorld;

require_once __DIR__ .'/../../vendor/autoload.php';

echo MyExternalHelloWorld::world().PHP_EOL;