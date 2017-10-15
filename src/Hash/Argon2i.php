<?php
declare(strict_types=1);

namespace XgcValueObject\ValueObject\Hash;

use XgcValueObject\Exception\InvalidPhpValueObjectException;

/**
 * Class Argon2i
 *
 * @package Xgc\Common\ValueObject\Hash
 */
class Argon2i
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $hash
     *
     * @return Argon2i
     */
    public static function get(string $hash): self
    {
        return new self($hash);
    }

    /**
     * @param string $value
     *
     * @return Argon2i
     *
     * @throws InvalidPhpValueObjectException
     */
    public static function hash(string $value): self
    {
        $hash = \password_hash($value, \PASSWORD_ARGON2I);
        if (!$hash) {
            throw new InvalidPhpValueObjectException('Invalid value for a password');
        }

        return new self($hash);
    }

    /**
     * Argon2i constructor.
     *
     * @param string $value
     */
    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public function verify($value): bool
    {
        return \password_verify($value, $this->value());
    }
}
