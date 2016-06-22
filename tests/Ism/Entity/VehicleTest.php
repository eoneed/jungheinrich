<?php
use PHPUnit\Framework\TestCase;

/**
 *
 */
class VehicleTest extends TestCase
{
    public function testBasics()
    {
        $id = 'VE123456789014';

        $vehicle = new \Ism\Entity\Vehicle();
        $this->assertEquals(null, $vehicle->getId());

        $vehicle = new \Ism\Entity\Vehicle(['id' => $id]);
        $this->assertEquals($id, $vehicle->getId());

        $this->assertEquals($vehicle, $vehicle->setId($id));

        $expected = ['id' => 'VE123456789014'];
        $this->assertEquals($vehicle->toArray(), $expected);
    }
}
