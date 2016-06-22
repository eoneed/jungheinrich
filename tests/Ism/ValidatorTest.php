<?php
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ValidatorTest extends TestCase
{

    protected $validator;

    public function setUp()
    {
        $this->validator = new \Ism\Validator();
    }

    /**
     *
     */
    public function testBasics()
    {
        $mock = $this->createMock('\Ism\Entity\Ride', [], array(), '', false);
        $this->assertEquals(true, $this->validator->validate($mock));

        $mock = $this->createMock('\Ism\Entity\Driver', [], array(), '', false);
        $this->assertEquals(true, $this->validator->validate($mock));

        $mock = $this->createMock('\Ism\Entity\Vehicle', [], array(), '', false);
        $this->assertEquals(true, $this->validator->validate($mock));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRideFailure()
    {
        $ride = new \Ism\Entity\Ride();
        $this->validator->validate($ride);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDriverFailure()
    {
        $driver = new \Ism\Entity\Driver();
        $this->validator->validate($driver);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVehicleFailure()
    {
        $vehicle = new \Ism\Entity\Vehicle();
        $this->validator->validate($vehicle);
    }
}
