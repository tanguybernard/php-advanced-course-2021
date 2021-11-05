<?php
namespace Course\App\Bash;

use DateTime;

if (count($argv) !== 3) {
    echo "Deux arguments attendus" . PHP_EOL;
    exit;
}

$firstDate = $argv[1];
$lastDate = $argv[2];

$path = '/var/www/html/json-movie-list/movies';
$data = [];
$data[] = ['Nom', 'Date de sortie', 'Catégories', 'Réalisateur(s)'];
foreach (range($firstDate, $lastDate) as $date) {
    $dateFolder = $path . '/' . $date;
    if(!is_dir($dateFolder)){
        continue;
    }
    $files = array_diff(scandir($dateFolder), array('..', '.'));
    foreach ($files as $file) {
        $filePath = $path . '/' . $date . '/' . $file;
        $object = json_decode(file_get_contents($filePath));
        if(!empty($object)){
            $movie = adapt($object);
            $data[] = [$movie->name, $movie->date, $movie->categories, $movie->director];
        }

    }
}

function createCsv($data) : void
{
    $fp = fopen(__DIR__ . '/file.csv', 'w');
    foreach ($data as $field) {
        fputcsv($fp, $field);
    }
    fclose($fp);
}

function adapt($objet): Movie
{
    $movie = new Movie();
    $movie->name = (property_exists($objet, 'name') ? $objet->name : '');
    $date = (property_exists($objet, 'release-date') ? $objet->{'release-date'} : '');
    $movie->date = empty($date) ? $date : DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    $movie->categories = (property_exists($objet, 'categories') ? implode(', ', $objet->categories) : '');
    $movie->director = (
    property_exists($objet, 'director')
        ? (
            is_array($objet->director)
                ? implode(', ', $objet->director)
                : $objet->director
            )
        : ''
    );
    return $movie;
}

class Movie
{
    public function __construct(
        public $name = null,
        public $date = null,
        public $categories = [],
        public $director = null)
    {
    }
}

createCsv($data);


// Attention de bien verifier vos données, parfois il y a deux réalisateurs dans un tableau comme le film de 2010 how-to-train-your-dragon.json
// Parfois un seul réalisateur, juste une chaine de caractères comme en 2010 pour inception