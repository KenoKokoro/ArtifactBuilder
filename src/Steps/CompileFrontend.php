<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;


class CompileFrontend extends BaseStep
{
    protected function start()
    {
        CMD::npmCompile();
    }
}