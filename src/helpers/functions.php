<?php

use Artifacts\Steps\BaseStep;

if ( ! function_exists('workspace')) {
    function workspace()
    {
        return BaseStep::$workspace;
    }
}

if ( ! function_exists('compilableExtensions')) {
    function compilableExtensions()
    {
        return [
            'js',
            'less',
            'scss',
            'sass',
            'vue'
        ];
    }
}

if ( ! function_exists('instance')) {
    function instance($className, ...$argv)
    {
        if ( ! class_exists($className)) {
            throw new Exception("Class {$className} not found.");
        }

        return new $className(...$argv);
    }
}
