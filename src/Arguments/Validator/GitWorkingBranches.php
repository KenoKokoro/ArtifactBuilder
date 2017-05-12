<?php


namespace Artifacts\Arguments\Validator;


use Artifacts\Arguments\Argument;

/**
 * Class GitWorkingBranches
 * @package Artifacts\Arguments\Validator
 * This is argument two send through the CLI
 */
class GitWorkingBranches extends Argument
{
    protected $pushedBranch;

    protected $existingBranch;

    public function __construct($value)
    {
        parent::__construct($value);
    }

    public function validate()
    {
        // TODO: Add more validation. Existance of branches, etc.
        return $this->validateStringFormat();
    }

    /**
     * Required format pushedBranch:existingBranch
     * example: story/1231-newly-created-branch-for-build:dev
     * @return bool
     */
    public function validateStringFormat(): bool
    {
        return (strpos($this->value(), ":") !== false)
               and (preg_match("/^.*\:.*$/", $this->value()) !== 0);
    }

    public function pushed()
    {
        if ( ! $this->pushedBranch) {
            $this->pushedBranch = @explode(":", $this->value())[0];
        }

        return $this->pushedBranch;
    }

    public function existing()
    {
        if ( ! $this->existingBranch) {
            $this->existingBranch = @explode(":", $this->value())[1];
        }

        return $this->existingBranch;
    }
}