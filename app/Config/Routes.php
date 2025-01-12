<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * ------------------------------------ --------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(); // Consider adding a custom 404 handler
$routes->setAutoRoute(false); // Disable auto-routing for better security

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Home Route
$routes->get('/', 'Home::index');

// Authentication Routes
$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::store');
$routes->get('/logout', 'AuthController::logout');

});

// Dashboard Routes
$routes->group('dashboard', ['namespace' => 'App\Controllers', 'filter' => 'auth'], function ($routes) {
    $routes->get('/', 'DashboardController::index'); // Main Dashboard page
    $routes->get('academic-performance', 'DashboardController::academicPerformance');
    
});

$routes->get('/job-recommendations', 'JobRecommendationsController::index');
$routes->get('/skills', 'StudentSubjectsController::skill');



// Student Profile Routes
$routes->group('student-profile', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'StudentProfileController::index');
    $routes->get('edit/(:segment)', 'StudentProfileController::edit/$1');
    $routes->post('update', 'StudentProfileController::update');
});

$routes->get('/student-subjects', 'StudentSubjectsController::index');
$routes->post('/student-subjects/search', 'StudentSubjectsController::search');
$routes->post('/student-subjects/add', 'StudentSubjectsController::add');
$routes->post('/student-subjects/delete/(:num)', 'StudentSubjectsController::delete/$1');
$routes->post('/student-subjects/updateGrade/(:num)', 'StudentSubjectsController::updateGrade/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
