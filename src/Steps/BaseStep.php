<?php


namespace Artifacts\Steps;


use Artifacts\Git;
use Artifacts\Workspace;

abstract class BaseStep
{
    public static $folderPath;

    /** @var Workspace|null */
    public static $workspace;

    /** @var  Git|null */
    public static $git;

    public function run()
    {
        if ( ! static::$workspace or ! static::$git) {
            throw new \InvalidArgumentException("Workspace or git are not set properly on " . get_class($this));
        }

        return $this->start();
    }

    protected function contains($fileOrFolderName)
    {
        if (is_array($fileOrFolderName)) {
            foreach ($fileOrFolderName as $fragment) {
                return $this->contains($fragment);
            }
        }

        return strpos(self::$git->difference(), $fileOrFolderName) !== false;
    }

    protected function folderExists($folder)
    {
        return is_dir($folder);
    }

    abstract protected function start();
}