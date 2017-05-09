<?php

namespace Artifacts;

use Artifacts\Steps\BaseStep;

class Builder
{
    protected $arguments = [];

    /** @var Steps */
    protected $steps;

    public function __construct($argv, Steps $steps)
    {
        $this->arguments = $argv;
        $this->steps = $steps;

        $this->prepare();
    }

    public function startBuildingArtifact()
    {
        return $this->steps->execute();
    }

    private function prepare()
    {
        BaseStep::$folderPath = $this->arguments[1];
        BaseStep::$workspace = new Workspace(BaseStep::$folderPath);
        BaseStep::$git = new Git(BaseStep::$workspace);
    }
}
