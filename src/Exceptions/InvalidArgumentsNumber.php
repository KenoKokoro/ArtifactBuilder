<?php


namespace Artifacts\Exceptions;


use Exception;

class InvalidArgumentsNumber extends Exception
{
    public function __construct()
    {
        parent::__construct("Invalid arguments. Expected: {workdir} {branch:branch}");
    }
}