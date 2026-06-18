<?php
$file = 'c:\\xampp\\htdocs\\enrollzy_frontend_new\\resources\\views\\pages\\about-us.blade.php';
$content = file_get_contents($file);

$coreValuesSearch = <<<EOT
<section class="core-values-section py-5 bg-light" style="background-color: #f8f9fa !important;">
    <div class="container py-lg-5">
EOT;
$coreValuesReplace = <<<EOT
<section class="core-values-section pt-5 pb-1 bg-light" style="background-color: #f8f9fa !important;">
    <div class="container pt-lg-5 pb-lg-2">
EOT;

$whatWeOfferSearch = <<<EOT
<section class="what-we-offer-section py-5 bg-light position-relative" style="background-color: #f8f9fc !important;">
    <div class="container-fluid px-4 py-lg-5" style="max-width: 1400px;">
EOT;
$whatWeOfferReplace = <<<EOT
<section class="what-we-offer-section pt-2 pb-5 bg-light position-relative" style="background-color: #f8f9fc !important;">
    <div class="container-fluid px-4 pt-lg-2 pb-lg-5" style="max-width: 1400px;">
EOT;

$content = str_replace($coreValuesSearch, $coreValuesReplace, $content);
$content = str_replace($whatWeOfferSearch, $whatWeOfferReplace, $content);

file_put_contents($file, $content);
echo "Patched spacing.";
