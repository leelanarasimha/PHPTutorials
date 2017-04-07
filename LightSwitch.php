<?php
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 07/04/17
 * Time: 9:14 PM
 */

class LightSwitch {

    public function on() {
        echo "Switch is on";
    }

    public function off() {
        echo "switch is off";
    }

    private function connect() {

    }

    private function activate() {

    }
}

$bedroomswitch = new LightSwitch();

$bedroomswitch->on();
$hallSwitch = new LightSwitch();
$hallSwitch->off();


$bedroomswitch->off();