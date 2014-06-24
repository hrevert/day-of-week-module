<?php
namespace HtDayModule\Validator;

use Zend\Validator\AbstractValidator;
use Zend\Validator\InArray;
use Hrevert\Day\Day as DayEntity;

class Day extends AbstractValidator
{
    const INVALID       = 'invalid';
    const INVALID_DAY   = 'invalidDay';

    /**
     * @var array
     */
    protected $messageTemplates = [
        self::INVALID       => 'Invalid type given. String or integer expected',
        self::INVALID_DAY   => 'Invalid Day.',
    ];

    public function isValid($value)
    {
        if ($value instanceof DayEntity) {
            return true;
        }

        if (!is_string($value) && !is_int($value)) {
            $this->error(self::INVALID);
            return false;
        }

        $validator = new InArray;
        $validator->setHaystack(array_keys(DayEntity::getOptions()));

        if (!$validator->isValid($value)) {
            $this->error(self::INVALID_DAY);
            return false;
        }

        return true;
    }
}
