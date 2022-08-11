<?php

// L’API de reflection de PHP permet de faire un reverse-engineer sur les classes, interfaces, fonctions, méthodes etc.
// Il existe une méthode getClosure() présent sur les classes ReflectionMethod et ReflectionFunction
// afin de créer une closure depuis une fonction ou une méthode spécifique.


class Compteur
{

    public function __construct(private $x =0)
    {
    }

    public function incremente()
    {
        $this->x++;
    }

    private function valeurCourante()
    {
        echo $this->x . PHP_EOL;
    }
}

$compteur = new Compteur();




$reflection = new ReflectionClass(get_class($compteur));
$closure    = $reflection->getMethod('valeurCourante')->getClosure($compteur);
$compteur->incremente();
$closure();

echo $reflection->getMethod('valeurCourante')->getNumberOfParameters().PHP_EOL;



// Un usage de la reflection, par exemple, générer automatiquement de la documentation, ex un document XML représentatif du squelette d'une classe.







//source: https://www.berejeb.com/2009/12/php-5-3-les-lambda-functions-et-les-closures-par-lexemple/