<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;


class NodeModules extends BaseStep
{
    const FOLDER = "%s/node_modules";
    const JSON_FILE = 'package.json';

    protected $nodePath;

    public function __construct()
    {
        $this->nodePath = sprintf(self::FOLDER, parent::$workspace);
    }

    public function start()
    {
        if ($this->folderExists($this->nodePath)) {
            return $this->installIfNeeded();
        }

        return $this->install();
    }

    protected function installIfNeeded()
    {
        if ($this->contains(self::JSON_FILE)) {
            $this->install();
        }
    }

    private function install()
    {
        CMD::npmInstall();
    }
}