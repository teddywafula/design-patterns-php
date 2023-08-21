<?php
interface Person {
    public function getName();
}

class ConcretePerson implements Person {
    public function getName()
    {
        return "concrete name";
    }
}
class Decorator implements Person {
    private $person;
    public function __construct(
        Person $person
    )
    {
        $this->person = $person;
    }

    public function getName()
    {
        return $this->person->getName();
    }
}

class DecoratorA extends Decorator {
    public function getName()
    {
        return "Decorator A details:(".parent::getName(). ").\n";
    }
}

class DecoratorB extends Decorator {
    public function getName()
    {
        return "Decorator B details:(".parent::getName(). ").\n";
    }
}

function client(Person $person)
{
    echo "client name:". $person->getName()."\n";
}

$details = new ConcretePerson();
client($details);

$c1 = new DecoratorA($details);
client($c1);
$d1 = new DecoratorB($c1);
client($d1);
