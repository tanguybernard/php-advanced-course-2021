<?php

trait MyTrait
{
    protected function accessVar(): string
    {
        return $this->var;
    }

    //abstract function getVar();// Oblige la classe utilisant le Trait à implémenter cette fonction

}

class TraitUser
{
    use MyTrait;

    private string $var = 'var';

    public function getVar(): string
    {
        return $this->accessVar();
    }
}

$t = new TraitUser();
echo $t->getVar().PHP_EOL; // -> 'var'

