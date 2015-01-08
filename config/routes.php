<?php
use Cake\Routing\Router;

Router::plugin('Editorial/Markitup', function ($routes) {
    $routes->fallbacks();
});
