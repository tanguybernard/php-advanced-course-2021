<?php

namespace Course\Courses\Patterns\Observers;
use SplObserver;
use SplSubject;

class Student implements SplSubject
{


    public function __construct(public $id)
    {
    }

    private $observers = [];

    private $grades = [];


    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    /**
     * Trigger an update in each subscriber.
     */
    public function notify(): void
    {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }

    public function detach(SplObserver $observer): void
    {
    }

    public function getAverage(): ?float
    {
        if(count($this->grades)>0){
            return round(array_sum($this->grades) / count($this->grades),2);
        }
        return null;
    }


    public function addGrade($grade){
        $this->grades[] = $grade;
        $this->notify();
    }
}


