<?php
$request = Request::create('/login', 'POST', ['mobile' => '9999999999', 'password' => 'password123']);
$controller = app(App\Http\Controllers\AuthController::class);
$response = $controller->login($request);
var_dump($response->getTargetUrl());
