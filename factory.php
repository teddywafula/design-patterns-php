<?php
interface Transport {
    public function move();
}

class Truck implements Transport {

    public function move()
    {
        return 'drive a truck on road';
    }
}

class Bicycle implements Transport {

    public function move()
    {
        return 'ride a bicycle';
    }
}

class Airplane implements Transport {

    public function move()
    {
        return 'fly in air';
    }
}

class Ship implements Transport {

    public function move()
    {
        return 'move by sea';
    }
}

class TransportFactory {
    public static function make($transport = null)
    {
        if ($transport == 'ship')
        {
            return new Ship();
        }

        if ($transport == 'bicycle')
        {
            return new Bicycle();
        }

        if ($transport == 'truck')
        {
            return new Truck();
        }

        if ($transport == 'air')
        {
            return new Airplane();
        }
       throw new \Exception('Error: Requires a valid transport method');
    }
}

function clientCode($mode)
{
    $class = TransportFactory::make($mode);
    echo $class->move(). "\n";
}
clientCode('air');
clientCode('ship');
clientCode('truck');
clientCode('bicycle');
try {
    clientCode('null');
} catch (\Throwable $e) {
    echo $e->getMessage(). "\n";
}



