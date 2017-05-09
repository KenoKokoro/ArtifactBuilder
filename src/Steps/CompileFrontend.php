<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;


class CompileFrontend extends BaseStep
{
    protected function start()
    {
        if ($this->contains(compilableExtensions())) {
            $this->compile();
        }
    }

    protected function compile()
    {
        CMD::npmCompile();
    }
}