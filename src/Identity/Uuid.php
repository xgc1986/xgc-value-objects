<?php
declare(strict_types=1);

namespace XgcValueObject\Identity;

use Assert\Assertion;
use Assert\AssertionFailedException;
use XgcValueObject\Exception\InvalidPhpValueObjectException;

/**
 * Class Uuid
 *
 * @package Xgc\Common\ValueObject\Identity
 */
class Uuid
{
    /**
     * @var self[]
     */
    private static $map = [];

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     *
     * @return self
     * @throws InvalidPhpValueObjectException
     */
    public static function get(string $value): self
    {
        return self::$map[$value] = self::$map[$value] ?? new self($value);
    }

    /**
     * Uuid constructor.
     *
     * @param string $value
     *
     * @throws InvalidPhpValueObjectException
     */
    private function __construct(string $value)
    {
        try {
            Assertion::uuid($value);
        } catch (AssertionFailedException $e) {
            throw new InvalidPhpValueObjectException($e->getMessage(), $e);
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
