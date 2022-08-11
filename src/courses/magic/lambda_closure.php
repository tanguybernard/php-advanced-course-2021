<?php

// Une lambda
// Une fonction lambda est une fonction PHP anonyme (déclarée a la volée, sans nom, un peu a la Java Script)
// qui peut être stockée dans une variable et passée comme argument a d’autres fonctions ou méthodes.

//EXEMPLE Une lambda qui retourne les valeurs supérieur à 5

$lambdaComparator = function ($value) { return $value > 5; };
$input = array(1, 2, 3, 4, 5, 6, 7);
$output = array_filter($input, $lambdaComparator);


// Une closure
// Une Closure est une fonction lambda qui est “consciente” de son contexte.


//EXEMPLE Changeons le nombre permis dans le tableau filtré.


$lambdaComparator = function($max) {
    return function ($value) use ($max) { return $value > $max; };
};

$input = array(1, 2, 3, 4, 5, 6, 7);
$output = array_filter($input, $lambdaComparator(6));


//arrow function

$lambdaComparator = fn($max) => function ($value) use ($max) { return $value > $max; };

//On continue, est plus besoin du use.
$lambdaComparator = fn($max) => fn($value) => $value > $max;

//var_dump($lambdaComparator(5)(10));


$input = array(1, 2, 3, 4, 5, 6, 7);
$output = array_filter($input, $lambdaComparator(6));


var_dump($output);



//La méthode magique __invoke() permet a un objet de se faire appeler comme une closure. par exemple :

class Chien
{
    public function __construct(public $color)
    {

    }

    public function __invoke()
    {
        echo "Je suis un chien de couleur ". $this->color.PHP_EOL;
    }
}
$dog = new Chien("bleu");
$dog();
//En appelant $dog en tant que fonction ($dog()), la methode __invoke() est automatiquement appelee transformant la classe en une closure.











//source: https://www.berejeb.com/2009/12/php-5-3-les-lambda-functions-et-les-closures-par-lexemple/