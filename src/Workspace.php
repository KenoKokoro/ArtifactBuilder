<?php


namespace Artifacts;


use InvalidArgumentException;

class Workspace
{
    private $path;

    public function __construct($path)
    {
        $this->validate($path);
        $this->path = $path;

    }

    public function getPath()
    {
        return $this->path;
    }

    private function validate($path)
    {
        if (is_dir($path) and is_dir("{$path}/.git")) {
            return true;
        }

        throw new InvalidArgumentException("{$path} does not exists, or .git folder is not found there.");
    }

    public function __toString()
    {
        return $this->path;
    }
}