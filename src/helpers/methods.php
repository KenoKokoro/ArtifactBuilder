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
