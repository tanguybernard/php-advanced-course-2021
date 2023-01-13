<?php
namespace Course\Courses\Patterns\Observers;

use SplObserver;
use SplSubject;

class Level implements SplObserver
{


    /**
     * @var array Student
     */
    private array $students = [];


    function cmp(Student $a, Student $b) {
        if ($a->getAverage() === $b->getAverage()) {
            return 0;
        }
        return ($a->getAverage() >$b->getAverage()) ? -1 : 1;
    }
    function ranking(){

        usort($this->students, array($this, "cmp"));
        return $this->students;

    }

    public function update(SplSubject $subject): void
    {
        $this->students[$subject->id] = $subject;
    }
}