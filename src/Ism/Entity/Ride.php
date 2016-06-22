<?php
namespace Ism\Entity;

/**
 */
use Ism\Entity;

/**
 */
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 */
class Ride extends Entity
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var \Ism\Entity\Driver
     */
    protected $driver;

    /**
     * @var \Ism\Entity\Vehicle
     */
    protected $vehicle;

    /**
     * \DateTime
     * @var string
     */
    protected $started;

    /**
     * \DateTime
     * @var string
     */
    protected $finished;

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return the $driver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param \Ism\Entity\Driver $driver
     * @return $this
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
        return $this;
    }

    /**
     * @return the $vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @param \Ism\Entity\Vehicle $vehicle
     * @return $this
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * @return the $started
     */
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * @param string $started
     * @return $this
     */
    public function setStarted($started)
    {
        $this->started = $started;
        return $this;
    }

    /**
     * @return $finished
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * @param string $finished
     * @return $this
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;
        return $this;
    }

    /**
     * Defines validation rules.
     */
    public static function loadValidatorRules(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint(
            'started', new Assert\NotBlank()
        );
        $metadata->addPropertyConstraint(
            'started', new Assert\Regex([
                'pattern' => '#^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\+\d{2}:\d{2}$#'
            ])
        );

        $metadata->addPropertyConstraint(
            'finished', new Assert\NotBlank()
        );
        $metadata->addPropertyConstraint(
            'finished', new Assert\Regex([
                'pattern' => '#^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\+\d{2}:\d{2}$#'
            ])
        );
    }
}
