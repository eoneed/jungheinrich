<?php
namespace Ism\Entity;

/**
 */
use Ism\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 */
class Driver extends Entity
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Defines validation rules.
     */
    public static function loadValidatorRules(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint(
            'id', new Assert\NotBlank()
        );
        $metadata->addPropertyConstraint(
            'id', new Assert\Regex(array('pattern' => '#^[0-9A-Z]{8}$#'))
        );
    }
}
