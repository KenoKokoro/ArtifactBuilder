<?php
use Artifacts\Builder;
use Artifacts\Steps;

include_once 'vendor/autoload.php';

// TODO: Steps config
//$steps = initialSteps($argv, $argc);

return (new Builder($argv, new Steps()))->startBuildingArtifact();