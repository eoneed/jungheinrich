<?php
use PHPUnit\Framework\TestCase;

/**
 *
 */
class RideTest extends TestCase
{
    public function testBasics()
    {
        $started = '2016-06-23T08:00:00+00:00';
        $finished = '2016-06-23T12:00:00+00:00';

        $ride = new \Ism\Entity\Ride([
            'started' => $started,
            'finished' => $finished
        ]);
        $this->assertEquals($started, $ride->getStarted());
        $this->assertEquals($finished, $ride->getFinished());

        $this->assertEquals($ride, $ride->setStarted($started));
        $this->assertEquals($ride, $ride->setFinished($finished));

        $expected = [
            'id' => null,
            'driver' => null,
            'vehicle' => null,
            'started' => $started,
            'finished' => $finished
        ];
        $this->assertEquals($ride->toArray(), $expected);
    }
}
