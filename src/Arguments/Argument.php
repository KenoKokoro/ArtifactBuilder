<?php


namespace Artifacts\Arguments;


use InvalidArgumentException;

abstract class Argument
{
    protected $value;

    public function __construct($value)
    {
        if ( ! $value) {
            throw new InvalidArgumentException("Empty argument supplied");
        }

        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public abstract function validate();

    public function __toString()
    {
        return (string)$this->value();
    }
}