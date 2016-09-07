<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->formsDir,
        $config->application->libraryDir
    ]
)->register();

$loader->registerClasses(
  [
    "Auth"  => $config->application->libraryDir . '/Auth/Auth.php',
    "Exception" => $config->application->libraryDir . '/Auth/Exception.php'
  ]
)->register();

// $loader->registerNamespaces([
//     'Demo\Models'      => $config->application->modelsDir,
//     'Demo\Controllers' => $config->application->controllersDir,
//     'Demo\Forms'       => $config->application->formsDir,
//     'Demo'             => $config->application->libraryDir
// ])->register();

// echo '<pre>';
// print_r($loader);die;