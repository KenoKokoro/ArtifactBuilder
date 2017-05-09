<?php

if ( ! function_exists('initialSteps')) {
    function initialSteps($argv, $argc)
    {
        $default = [
            \Artifacts\Steps\Composer::class,
            \Artifacts\Steps\CompileFrontend::class,
        ];

        if (isset($argv[2]) and strpos($argv[2], '--steps=') !== false) {
            $steps = explode(',', preg_replace("/--steps=/", '', $argv[2]));
            $selected = [];
            foreach ($steps as $index) {
                $selected = $default[$index];
            }

            return $selected;
        }

        return $default;
    }
}
