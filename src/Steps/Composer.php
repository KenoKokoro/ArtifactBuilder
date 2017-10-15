<?php


namespace Artifacts\Steps;

use Artifacts\Commands\Factory as CMD;


class Composer extends BaseStep
{
    const FOLDER = "%s/vendor";
    const JSON_FILE = 'composer.json';

    protected $vendorPath;

    public function __construct()
    {
        $this->vendorPath = sprintf(self::FOLDER, parent::$workspace);
    }

    protected function start()
    {
        if ($this->folderExists($this->vendorPath)) {
            return $this->updateIfChanged();
        }

        return $this->installToLatest();
    }

    protected function updateIfChanged()
    {
        if ($this->contains(self::JSON_FILE)) {
            $this->update();
        }

        $this->dumpAutoload();
    }

    protected function installToLatest()
    {
        if ( ! $this->contains(self::JSON_FILE)) {
            return;
        }
        $this->install();
        $this->update();
        $this->dumpAutoload();
    }

    protected function install()
    {
        CMD::composerInstall();
    }

    protected function update()
    {
        CMD::composerUpdate();
    }

    private function dumpAutoload()
    {
        CMD::dumpAutoload();
    }
}