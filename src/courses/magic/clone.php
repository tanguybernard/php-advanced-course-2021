<?php
class Personne{
    private $cni;
    private $nom;
    private $age;

    public function __construct($cni,$nom,$age){
        $this->cni = $cni;
        $this->nom = $nom;
        $this->age = $age;
    }

    public function __destruct(){
        echo sprintf("Personne avec le CNI: %s est détruit.
    ",
            $this->cni);
    }

    public function __toString(){
        return sprintf("CNI: %s, Nom: %s, Age: %s,
    ",
            $this->cni,
            $this->nom,
            $this->age);
    }

    public function __clone(){
        echo 'Copie un Objet'.PHP_EOL;
    }
}


// Nous avons créé deux objets: $personne1 et $personne2. $personne1 et $personne2 sont des références qui pointent vers différents objets « Personne ».
$personne1 = new Personne('121000992', 'Jean', '25');
echo $personne1;

$personne2 = new Personne('365000892','Yohan','22');
echo $personne2;

//copie superficielle (shallow copy) (juste un changement de reference)
// $personne2 = $personne1;


//deep copy
$personne2 = clone $personne1;

echo 'Program END'.PHP_EOL;











//source: https://waytolearnx.com/2019/07/clonage-dobjet-en-php.html