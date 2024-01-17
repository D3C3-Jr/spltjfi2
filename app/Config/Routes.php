<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('departement', 'DepartementController::index', ['filter' => 'role:Administrator']);
$routes->get('departement/departementRead', 'DepartementController::departementRead');
$routes->post('departement/departementSave', 'DepartementController::departementSave');
$routes->post('departement/departementUpdate', 'DepartementController::departementUpdate');
$routes->get('departement/departementEdit/(:num)', 'DepartementController::departementEdit/$1');
$routes->delete('departement/departementDelete/(:num)', 'DepartementController::departementDelete/$1');

$routes->get('karyawan', 'KaryawanController::index', ['filter' => 'role:Administrator,Admin HRGA']);
$routes->get('karyawan/karyawanRead', 'KaryawanController::karyawanRead');
$routes->post('karyawan/karyawanSave', 'KaryawanController::karyawanSave');
$routes->post('karyawan/karyawanUpdate', 'KaryawanController::karyawanUpdate');
$routes->get('karyawan/karyawanEdit/(:num)', 'KaryawanController::karyawanEdit/$1');
$routes->delete('karyawan/karyawanDelete/(:num)', 'KaryawanController::karyawanDelete/$1');

$routes->get('spl', 'SplController::index');
$routes->get('spl/splRead', 'SplController::splRead');
$routes->post('spl/splSave', 'SplController::splSave');
$routes->post('spl/splUpdate', 'SplController::splUpdate');
$routes->get('spl/splEdit/(:num)', 'SplController::splEdit/$1');
$routes->delete('spl/splDelete/(:num)', 'SplController::splDelete/$1');

$routes->get('role', 'RoleController::index', ['filter' => 'role:Administrator']);
$routes->get('role/roleRead', 'RoleController::roleRead');
$routes->post('role/roleSave', 'RoleController::roleSave');
$routes->post('role/roleUpdate', 'RoleController::roleUpdate');
$routes->get('role/roleEdit/(:num)', 'RoleController::roleEdit/$1');
$routes->delete('role/roleDelete/(:num)', 'RoleController::roleDelete/$1');

$routes->get('user', 'UserController::index', ['filter' => 'role:Administrator']);
$routes->get('user/userRead', 'UserController::userRead');
$routes->post('user/userSave', 'UserController::userSave');
$routes->post('user/userUpdate', 'UserController::userUpdate');
$routes->get('user/userEdit/(:num)', 'UserController::userEdit/$1');
$routes->delete('user/userDelete/(:num)', 'UserController::userDelete/$1');

$routes->get('user', 'UserController::index', ['filter' => 'role:Administrator']);
$routes->get('user/groupUserRead', 'UserController::groupUserRead');
$routes->post('user/groupUserSave', 'UserController::groupUserSave');
$routes->post('user/groupUserUpdate', 'UserController::groupUserUpdate');
$routes->get('user/groupUserEdit/(:num)', 'UserController::groupUserEdit/$1');
$routes->delete('user/groupUserDelete/(:num)', 'UserController::groupUserDelete/$1');
