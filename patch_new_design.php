<?php
$sourceFile = 'C:\xampp\htdocs\enrollzy_new_design\index.html';
$targetFile = 'C:\xampp\htdocs\enrollzy_frontend_new\resources\views\pages\new_home.blade.php';

$content = file_get_contents($sourceFile);

// Replace href="assets/...
$content = preg_replace('/href="assets\/(.*?)"/', 'href="{{ asset(\'assets/$1\') }}"', $content);

// Replace src="assets/...
$content = preg_replace('/src="assets\/(.*?)"/', 'src="{{ asset(\'assets/$1\') }}"', $content);

// Replace url(assets/...
$content = preg_replace('/url\([\'"]?assets\/(.*?)[\'"]?\)/', 'url(\'{{ asset(\\\'assets/$1\\\') }}\')', $content);

file_put_contents($targetFile, $content);

echo "Copied and patched index.html to new_home.blade.php\n";
