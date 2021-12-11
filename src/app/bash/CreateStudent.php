<?php

class Student
{
    public function __construct(public $firstName, public $lastName, public $grades)
    {
    }

    public function average(): float|int
    {
        return round((array_reduce($this->grades, function ($total, Grade $item) {
                $total += $item->grade;
                return $total;
            })) / count($this->grades),2);
    }

    public function __toString(): string
    {
        return "$this->firstName $this->lastName has an average of {$this->average()}";
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

class GradeService {

    /**
     * @param Student[] $group
     */
    public function __construct(private array $group)
    {
    }

    /**
     * @throws Exception
     */
    function averageGroup(): float|int
    {
        if(empty($this->group)){
            throw new Exception('There is no students in this group !');
        }
        return array_reduce($this->group, function ($total, Student $item) {
                $total += $item->average();
                return $total;
            }) / count($this->group);
    }

    function getStudentMax() {
        $max =0;
        $student = null;
        foreach ($this->group as $item){
            if($max <= $item->average()) {
                $max = $item->average();
                $student = $item;
            }

        }
        return $student;
    }

}

$grades1 = GradesFactory::create(['math' => 18, 'fr' => 9, 'sport' => 12]);//new Grade(....), new Grade()
$grades3 = GradesFactory::create(['math' => 2, 'fr' => 2, 'sport' => 2]);
$grades2 = GradesFactory::create(['math' => 14, 'fr' => 16, 'sport' => 13]);
$student1 = new Student("John", "Doe", $grades1);
$student2 = new Student("Alice", "Lapin", $grades2);
$student3 = new Student("Toto", "T", $grades3);

$group = [$student1, $student2, $student3];
$service = new GradeService($group);

try {
    var_dump($service->averageGroup());
} catch (Exception $e) {
    //log
}

echo "Meilleure étudiant(e) : {$service->getStudentMax()}".PHP_EOL;





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