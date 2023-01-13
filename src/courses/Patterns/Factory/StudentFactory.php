<?php
namespace Course\Courses\Patterns\Factory;
use Course\Courses\Patterns\Observers\Student;

class StudentFactory{

    function buildStudent(string $name, array $observers): Student
    {

        $student = new Student(uniqid(), $name);

        foreach ($observers as $observer){
            $student->attach($observer);
        }

        return $student;


    }

}