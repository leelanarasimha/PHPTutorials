<?php

require 'Task.php';



$firsttask = new Task('Go to Store', 'Hyderabad');
$firsttask->taskname = 'Go to shopping mall';
$firsttask->location = 'Delhi';


$secondtask = new Task('Go to Office', 'Vizag');
$secondtask->complete();


$tasks = array($firsttask, $secondtask);



require 'view.php';
