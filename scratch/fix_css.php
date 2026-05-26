<?php
$css = file_get_contents('c:/xampp/htdocs/enrollzy_frontend_new/public/css/home.css');
// Use preg_replace to target the line directly
$css = preg_replace('/(\.accordion-button:not\(\.collapsed\)\s*\.faq-icon::before\s*\{\s*content:\s*")[^"]+("\s*;)/', '$1-$2', $css);
file_put_contents('c:/xampp/htdocs/enrollzy_frontend_new/public/css/home.css', $css);
echo "Done";
