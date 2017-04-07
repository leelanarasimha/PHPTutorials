<?php
class Task {

  public $taskname;
  public $location = 'Hyderabad';
  public $completed = false;

  public function __construct($taskname, $location) {
    $this->taskname = $taskname;
    $this->location = $location;
  }

  public function complete() {
    $this->completed = true;
  }

  public function getTaskName() {
    return $this->taskname;
  }



}

 ?>
