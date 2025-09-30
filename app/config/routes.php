<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

$router->get('/', 'UserController::landing_page');

$router->get('/users/view', 'UserController::get_all');
$router->match('/users/add_User', 'UserController::create', ['GET', 'POST']);
$router->match('/users/update_User/{id}', 'UserController::update', array('GET', 'POST'));
$router->match('/users/delete/{id}', 'UserController::delete', array('GET', 'POST'));


/*$router->match('/update', 'UserController::update', array('GET', 'POST'));
$router->match('/update/{id}', 'UserController::update', array('GET', 'POST')); */


//$router->match('/get_all/{page}', 'UserController::get_all', array('GET', 'POST'));
//$router->match('/students/search', 'UserController::search', array('GET', 'POST'));
$router->match('/user/dashboard', 'UserController::user_view', array('GET', 'POST'));

$router->match('/auth/login', 'AuthController::login', array('GET', 'POST'));
$router->get('/auth/logout', 'AuthController::logout');
$router->match('/auth/register', 'AuthController::register', array('GET', 'POST'));

$router->match('auth/password-reset', 'AuthController::password_reset', ['POST', 'GET']);
$router->match('auth/set-new-password', 'Auth::set_new_password', ['POST', 'GET']);