<?php
use Artifacts\Arguments\Bootstrap;
use Artifacts\Arguments\Validator\Validation;
use Artifacts\Builder;
use Artifacts\Steps;

include_once __DIR__ . "/vendor/autoload.php";

$bootstraper = new Bootstrap($argv, new Validation);
$bootstraper->validateInputArguments();
$bootstraper->setEnvironment();


// TODO: Steps config as arguments
//$steps = initialSteps($argv, $argc);

return (new Builder($argv, new Steps()))->startBuildingArtifact();