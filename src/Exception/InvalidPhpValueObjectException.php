<?php
declare(strict_types=1);

namespace XgcValueObject\Exception;

use Exception;

/**
 * Class InvalidPhpValueObjectException
 *
 * @package Xgc\Common\Exception
 */
class InvalidPhpValueObjectException extends Exception
{
    /**
     * InvalidPhpValueObjectException constructor.
     *
     * @param string         $message
     * @param Exception|null $previous
     */
    public function __construct(string $message, ?Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
