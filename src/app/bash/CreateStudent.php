<?php

trait Average{
    public function average(): float|int
    {
        return round((array_reduce($this->grades, function ($total, Grade $item) {
                $total += $item->grade;
                return $total;
            })) / count($this->grades),2);
    }
}

class Student
{

    use Average;

    public function __construct(public $firstName, public $lastName, public $grades)
    {
    }

    /*public function average(): float|int
    {
        return round((array_reduce($this->grades, function ($total, Grade $item) {
                $total += $item->grade;
                return $total;
            })) / count($this->grades),2);
    }*/

    public function __toString(): string
    {
        return "$this->firstName $this->lastName has an average of {$this->average()}";
    }

}

class Promotion {

    use Average;

    public $grades;
    /** @var Student[] $students **/
    public function __construct(public $students)
    {
        $this->setNotes();
    }

    public function setNotes():void {
        foreach ($this->students as $student){
            $this->grades[] = new Grade('moyenne', $student->average());
        }
    }

    /*public function average(): float|int
    {
        return round((array_reduce($this->grades, function ($total, Grade $item) {
                $total += $item->grade;
                return $total;
            })) / count($this->grades),2);
    }*/

    function getStudentMax(): Student{
        $max =0;
        $student = null;
        foreach ($this->students as $item){
            if($max <= $item->average()) {
                $max = $item->average();
                $student = $item;
            }

        }
        return $student;
    }
}

class Grade
{
    public function __construct(public $subject, public $grade)
    {
    }
}

class GradesFactory
{
    public static function create(array $items): array
    {
        $result = [];
        foreach ($items as $key => $value) {
            $result[] = new Grade($key, $value);
        }
        return $result;
    }
}

$grades1 = GradesFactory::create(['math' => 18, 'fr' => 9, 'sport' => 12]);//new Grade(....), new Grade()
$grades3 = GradesFactory::create(['math' => 2, 'fr' => 2, 'sport' => 2]);
$grades2 = GradesFactory::create(['math' => 14, 'fr' => 16, 'sport' => 13]);
$student1 = new Student("John", "Doe", $grades1);
$student2 = new Student("Alice", "Merveille", $grades2);
$student3 = new Student("Aurélien", "Cotentin", $grades3);

$group = [$student1, $student2, $student3];

function tri(Student $student1, Student $student2){
    if ($student1->average() === $student2->average()) {
        return 0;
    }
    return ($student1->average() < $student2->average()) ? -1 : 1;
}

usort($group, "tri");

foreach ($group as $key => $value) {
    echo "$key: $value\n";
}



$promo = new Promotion($group);

echo "PROMO".PHP_EOL;
echo $promo->average().PHP_EOL;
echo "Meilleur(e) étudiant(e): ".$promo->getStudentMax().PHP_EOL;