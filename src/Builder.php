<?php

namespace Artifacts;

class Builder
{
    protected $arguments = [];

    /** @var Steps */
    protected $steps;

    public function __construct($argv, Steps $steps)
    {
        $this->arguments = $argv;
        $this->steps = $steps;
    }

    public function startBuildingArtifact()
    {
        return $this->steps->execute();
    }
}
