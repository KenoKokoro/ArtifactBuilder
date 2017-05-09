<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;


class Database extends BaseStep
{
    const FOLDER = 'migrations';

    protected function start()
    {
        if ($this->contains(self::FOLDER)) {
            $this->migrate();
        }
    }

    protected function migrate()
    {
        CMD::migrate();
    }
}