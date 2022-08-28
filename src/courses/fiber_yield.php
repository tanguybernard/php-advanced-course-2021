<?php
/*
 * L'entrée est constituée de champs séparés par un point-virgule,
 * et le premier champ est un ID à utiliser comme clé.
 */

$input = <<<'EOF'
1;PHP;Likes dollar signs
2;Python;Likes whitespace
3;Ruby;Likes blocks
EOF;

function input_parser($input) {
    foreach (explode("\n", $input) as $line) {
        $fields = explode(';', $line);
        $id = array_shift($fields);

        yield $id => $fields;
    }
    //avantage, pas besoin de stocker le résultat en mémoire
}

foreach (input_parser($input) as $id => $fields) {
    echo "$id:\n";
    echo "    $fields[0]\n";
    echo "    $fields[1]\n";
}



//Fiber
$fiber = new Fiber(function () use ($input): void {
    Fiber::suspend('wait');
    foreach (explode("\n", $input) as $line) {
        $fields = explode(';', $line);
        $id = array_shift($fields);

        Fiber::suspend([$id, $fields]);
    }
});

$value = $fiber->start();//"wait"


//avantage du fiber, je peux l'appeler dans n'importe quel contexte contrairement au yield
//yield generateur sur lequel on est obligé d'itérer

do{
    [$idF, $fieldsF] = $fiber->resume();

    if(isset($idF)){
        echo "$idF:\n";
        echo "    $fieldsF[0]\n";
        echo "    $fieldsF[1]\n";
    }

} while(!$fiber->isTerminated());
