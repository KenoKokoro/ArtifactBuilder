<?php


namespace Artifacts;


use Artifacts\Steps\BaseStep;
use Artifacts\Steps\Behat;
use Artifacts\Steps\Composer;
use Artifacts\Steps\CompileFrontend;
use Artifacts\Steps\Database;
use Artifacts\Steps\NodeModules;
use Artifacts\Steps\PhpUnit;

class Steps
{
    protected $steps = [];

    public function __construct(array $steps = null)
    {
        if (is_null($steps)) {
            $steps = $this->defaultSteps();
        }
        $this->steps = $steps;
    }

    public function execute()
    {
        foreach ($this->steps as $step) {
            /** @var BaseStep $instance */
            $instance = (new $step);
            // TODO: Implement before hooks
            $this->infoStep($instance, 'initialized');
            $instance->run();
            // TODO: Implement after hooks
            $this->infoStep($instance, 'finished');
        }

        return true;
    }

    protected function defaultSteps()
    {
        return [
            Composer::class,
            NodeModules::class,
            CompileFrontend::class,
            //Database::class,
            Behat::class,
            //PhpUnit::class,
        ];
    }

    private function infoStep($instance, $info)
    {
        echo "\n#######################\n";
        echo get_class($instance) . " Step {$info}.";
        echo "\n#######################\n";
    }
}