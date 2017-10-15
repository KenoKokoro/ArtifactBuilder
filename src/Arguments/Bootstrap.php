<?php


namespace Artifacts\Arguments;


use Artifacts\Arguments\Validator\GitWorkingBranches;
use Artifacts\Arguments\Validator\WorkingDirectory;
use Artifacts\Arguments\Validator\Validation;
use Artifacts\Exceptions\InvalidArgumentsNumber;
use Artifacts\Git;
use Artifacts\Steps\BaseStep;
use Artifacts\Workspace;

class Bootstrap
{
    /** @var Validation */
    protected $validator;

    /** @var array */
    protected $argv = [];

    protected $arguments = [];

    public function __construct(array $argv = [], Validation $validator)
    {
        unset($argv[0]);
        $this->validator = $validator;
        $this->argv = $argv;
    }

    public function setEnvironment()
    {
        BaseStep::$folderPath = (string)$this->arguments[WorkingDirectory::class];
        BaseStep::$workspace = new Workspace(BaseStep::$folderPath);
        Git::$pushedBranch = $this->arguments[GitWorkingBranches::class]->pushed();
        Git::$existingBranch = $this->arguments[GitWorkingBranches::class]->existing();
        BaseStep::$git = new Git(BaseStep::$workspace);
    }

    public function validateInputArguments()
    {
        if (count($this->argv) != 2) {
            throw new InvalidArgumentsNumber;
        }

        foreach ($this->argv as $index => $value) {
            $instance = $this->argumentInstance($index, $value);

            if ( ! $instance) {
                return;
            }

            $this->validator->validate($instance);
            $this->arguments[get_class($instance)] = $instance;
        }
    }

    protected function argumentInstance(int $index, $value)
    {
        $mappings = $this->argumentMaping();
        if (isset($mappings[$index])) {
            return instance($mappings[$index], ...[$value]);
        }

        echo "\nWarning: No class defined for argument index {$index} with value {$value}";

        return null;
    }

    private function argumentMaping()
    {
        return [
            1 => WorkingDirectory::class,
            2 => GitWorkingBranches::class,
        ];
    }
}