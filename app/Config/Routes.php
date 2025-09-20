<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('buscador', 'SuperHeroController::index');
$routes->get('superheroes/exportPdf', 'SuperHeroController::exportPdf');
