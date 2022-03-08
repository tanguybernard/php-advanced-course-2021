<?php

class User {
    public function __construct(public string $name, public  int $age)
    {

    }
}

$mapper = function(array $arr) : array{
    return array_map(function(User $user){
        return $user->name;
    }, $arr);
};

function exampleMethod(callable $mapper) {
    $user1 = new User("Joe",34);
    $user2 = new User("Bob",78);

    return $mapper([$user1,$user2]);
}

var_dump(exampleMethod($mapper)).PHP_EOL;