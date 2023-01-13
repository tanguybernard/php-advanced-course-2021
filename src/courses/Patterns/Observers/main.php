<?php

namespace Course\Courses\Patterns\Observers;

require '../../../vendor/autoload.php';

$observer = new Level();
$s1 = new Student( uniqid());
$s1->attach($observer);
$s1->addGrade(15);
$s2 = new Student( uniqid());
$s2->attach($observer);
$s2->addGrade(12);

$s3 = new Student( uniqid());
$s3->attach($observer);
$s3->addGrade(18);
$s3->addGrade(0);


//var_dump($observer->ranking());

foreach ($observer->ranking() as $s){
    echo $s->id . " ". $s->getAverage().PHP_EOL;
}


