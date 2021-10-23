<?php
require_once "vendor/autoload.php";

use Course\App\Person;

$person = new Person('Jean Paul');

echo $person->firstName;