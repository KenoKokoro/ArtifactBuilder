<?php


namespace Artifacts\Commands;


use Artifacts\Git;

class Factory
{
    public static function gitDiffTree()
    {
        $gitLocation = "--work-tree=" . workspace() . " --git-dir=" . workspace() . "/.git";

        return Executor::runAndReturn("git {$gitLocation} diff-tree -r --name-only --no-commit-id " . Git::$dev);
    }

    public static function composerInstall()
    {
        Executor::run("composer install --prefer-dist --working-dir=" . workspace());
    }

    public static function composerUpdate()
    {
        Executor::run("composer update --prefer-dist --working-dir=" . workspace());
    }

    public static function npmInstall()
    {
        Executor::run("npm install --prefix=" . workspace());
    }

    public static function npmCompile()
    {
        Executor::run("npm run dev --prefix=" . workspace());
    }

    public static function migrate()
    {
        Executor::run("php " . workspace() . "/artisan migrate");
    }

    public static function behat()
    {
        Executor::run("cd " . workspace() . " && vendor/bin/behat");
    }

    public static function dumpAutoload()
    {
        Executor::run("composer dump-autoload -o --working-dir=" . workspace());
    }

    public static function phpunit()
    {
        Executor::run("cd " . workspace() . " && vendor/bin/phpunit");
    }
}