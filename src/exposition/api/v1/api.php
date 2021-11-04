<?php

use Course\App\Person;

require_once "../../../vendor/autoload.php";
var_dump($_GET);

$person = new Person("Test");
echo $person->firstName;