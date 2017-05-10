<?php


namespace Artifacts\Arguments\Validator;


use Artifacts\Arguments\Argument;

/**
 * Class WorkingDirectory
 * @package Artifacts\Arguments\Validator
 * This is argument one send through the CLI
 */
class WorkingDirectory extends Argument
{
    public function validate()
    {
        return is_dir($this->value()) and is_dir($this->value() . "/.git");
    }
}