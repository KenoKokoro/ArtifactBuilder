<?php


namespace Artifacts\Commands;


class Executor
{
    public static function run($cmd, $print = true)
    {
        exec($cmd, $output, $return);

        if ($print) {
            echo @implode("\n", $output);
        }

        if ($return) {
            echo ($print) ?: @implode("\n", $output);
            echo "\n\nExit code is not 0. Aborting.\n";
            exit(1);
        }
    }

    public static function runAndReturn($cmd)
    {
        return shell_exec($cmd);
    }
}