<?php

$router = new \Phalcon\Mvc\Router(false);

$router->removeExtraSlashes(true);

$router->add('/about', [
    // 'module' => 'frontend',
    // 'namespace' => 'AlbumOrama\Frontend\Controllers\\',
    'controller' => 'test',
    'action' => 'index'
]);

// Retrieves all robots
$router->add('/api/users', function () {

    $phql = "SELECT * FROM users";
    echo $phql;die;

});


/**
 * Backend routes
 */

return $router;
