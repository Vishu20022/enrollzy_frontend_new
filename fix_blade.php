<?php
$targetFile = 'C:\xampp\htdocs\enrollzy_frontend_new\resources\views\pages\new_home.blade.php';

$content = file_get_contents($targetFile);
$content = str_replace('asset(\\\'assets/', 'asset(\'assets/', $content);
$content = preg_replace('/(\.[a-zA-Z0-9]+)\\\'\)/', '$1\')', $content);

// To be completely safe with any escaped quotes inside asset(), I'll just use a regex:
$content = preg_replace('/\{\{ asset\(\\\'(.*?)\\\'\) \}\}/', '{{ asset(\'$1\') }}', $content);

file_put_contents($targetFile, $content);
echo "Fixed Blade syntax errors.\n";
