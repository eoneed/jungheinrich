<?php
use PHPUnit\Framework\TestCase;

/**
 *
 */
class DriverTest extends TestCase
{
    public function testBasics()
    {
        $id = 'AK123456';

        $driver = new \Ism\Entity\Driver();
        $this->assertEquals(null, $driver->getId());

        $driver = new \Ism\Entity\Driver(['id' => $id]);
        $this->assertEquals($id, $driver->getId());

        $this->assertEquals($driver, $driver->setId($id));

        $expected = ['id' => 'AK123456'];
        $this->assertEquals($driver->toArray(), $expected);
    }
}
