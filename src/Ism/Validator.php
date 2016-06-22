<?php
namespace Ism;

/**
 *
 */
use \Ism\Entity;

use \Symfony\Component\Validator\Validation;

/**
 *
 */
class Validator
{

    /**
     * @var string
     */
    protected $explain = 'The following values are invalid: ';

    /**
     * @var string
     */
    protected $message = '%s::%s (%s)';

    /**
     * @var \Symfony\Component\Validator\Validation
     */
    protected $validator;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @return boolean
     */
    public function validate(Entity $entity, $rules = null)
    {

        if ($entity->hasValidationRules()) {

            $this->validator = Validation::createValidatorBuilder()
                ->addMethodMapping('loadValidatorRules')->getValidator();

            $violations = $this->validator->validate($entity);

            if (count($violations) > 0) {
                $messages = [];

                foreach($violations as $violation) {
                    $messages[] = sprintf(
                        $this->message,
                        get_class($entity),
                        $violation->getPropertyPath(),
                        $violation->getInvalidValue()
                    );
                }

                throw new \InvalidArgumentException(
                    $this->explain . implode(', ', $messages)
                );
            }
        }

        return true;
    }
}
