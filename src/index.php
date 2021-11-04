<?php
require_once "vendor/autoload.php";

use Course\App\Person;

const ROOT_DIR = __DIR__;

$person = new Person('Jean Paul');

echo $person->firstName;