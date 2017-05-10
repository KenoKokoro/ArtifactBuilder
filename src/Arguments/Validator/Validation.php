<?php


namespace Artifacts\Arguments\Validator;


use Artifacts\Arguments\Argument;

class Validation
{
    public function validate(Argument $argument)
    {
        if ( ! $this->passes($argument)) {
            echo "Incorrect value for " . get_class($argument) . "\n{$argument->value()} Given";
            die();
        }
    }

    protected function passes(Argument $argument)
    {
        return $argument->validate();
    }
}