<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;

class Behat extends BaseStep
{
    protected function start()
    {
        // TODO: Implement junit or some coverage shit
        CMD::behat();
    }
}