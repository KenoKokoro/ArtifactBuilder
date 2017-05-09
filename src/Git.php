<?php


namespace Artifacts;

use Artifacts\Commands\Factory as CMD;


class Git
{
    protected $workspace;

    protected $difference;

    static public $dev = 'dev';

    public function __construct(Workspace $workspace)
    {
        $this->workspace = $workspace;

        $this->diffHeads();
    }

    public function diffHeads()
    {
        $this->difference = CMD::gitDiffTree();
        die($this->difference);
    }

    public function workspace()
    {
        return $this->workspace;
    }

    public function difference()
    {
        return $this->difference;
    }
}