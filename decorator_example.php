<?php
interface Car {
    public function cost();
    public function description();
}

class Suv implements Car {
    public function cost()
    {
        return 20000;
    }

    public function description()
    {
        return 'Suv car';
    }
}


class Sedan implements Car {
    public function cost()
    {
        return 15000;
    }

    public function description()
    {
        return 'Sedan car';
    }
}


abstract class CarFeature implements Car{
    protected Car $car;
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    abstract public function cost();
    abstract public function description();
}

class SunRoof extends CarFeature {

    public function cost()
    {
        return $this->car->cost() + 3000;
    }

    public function description()
    {
        return $this->car->description() . ', with sunroof';
    }
}

class HighEndWheels extends CarFeature {

    public function cost()
    {
        return $this->car->cost() + 12000;
    }

    public function description()
    {
        return $this->car->description() . ', with high end wheels';
    }
}


$car = new Suv();
echo 'Cost is '.$car->cost() . ' '. $car->description(). "\n";

$carWithhighEndWheels = new HighEndWheels($car);
echo 'Cost is '.$carWithhighEndWheels->cost() . ' '. $carWithhighEndWheels->description(). "\n";

$carWithSunRoof = new SunRoof($car);
echo 'Cost is '.$carWithSunRoof->cost() . ' '. $carWithSunRoof->description(). "\n";
