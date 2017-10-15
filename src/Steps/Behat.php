<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;

class Behat extends BaseStep
{
    const FILE = 'behat.yml';

    protected function start()
    {
        if ( ! $this->contains(self::FILE)) {
            return;
        }

        // TODO: Implement junit or some coverage shit
        CMD::behat();
    }
}