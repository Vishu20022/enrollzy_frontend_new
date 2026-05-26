<?php
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/login', 'POST', [
    'mobile' => '9999999999',
    'password' => 'password123',
    '_token' => csrf_token() // Need session for this, might be tricky
]);

$response = $kernel->handle($request);
var_dump($response->getStatusCode());
var_dump($response->headers->get('Location'));
