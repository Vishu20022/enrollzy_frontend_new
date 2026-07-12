<?php
$targetFile = 'C:\xampp\htdocs\enrollzy_frontend_new\resources\views\pages\new_home.blade.php';

$content = file_get_contents($targetFile);
// Replace any lingering escaped single quotes inside the asset function
$content = str_replace('\\\'', '\'', $content);

file_put_contents($targetFile, $content);
echo "Removed all escaped single quotes.\n";
