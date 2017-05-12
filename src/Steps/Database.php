<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;


class Database extends BaseStep
{
    const FOLDER = 'migrations';

    protected function start()
    {
        CMD::refreshDatabase();
    }
}