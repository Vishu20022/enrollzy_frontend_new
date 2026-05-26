<?php
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->instance(\App\Http\Middleware\VerifyCsrfToken::class, new class {
    public function handle($request, $next) { return $next($request); }
});

$request = Illuminate\Http\Request::create(
        '/login',
        'POST',
        [
            'mobile' => '9999999999',
            'password' => 'password123',
        ]
    );
$request->setLaravelSession($app->make('session')->driver());
$request->session()->put('site_protected_access', true);

$response = $kernel->handle($request);

echo "Status: " . $response->getStatusCode() . "\n";
echo "Redirect: " . $response->headers->get('Location') . "\n";

$kernel->terminate($request, $response);
