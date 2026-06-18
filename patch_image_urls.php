<?php
$file = 'c:\\xampp\\htdocs\\enrollzy_frontend_new\\resources\\views\\pages\\about-us.blade.php';
$content = file_get_contents($file);

$replacements = [
    'asset($page->hero_image)' => "env('BACKEND_URL') . '/' . \$page->hero_image",
    'asset($page->story_image)' => "env('BACKEND_URL') . '/' . \$page->story_image",
    'asset($offer->icon_image)' => "env('BACKEND_URL') . '/' . \$offer->icon_image",
    'asset($feature->icon_image)' => "env('BACKEND_URL') . '/' . \$feature->icon_image",
    'asset($impact->icon_image)' => "env('BACKEND_URL') . '/' . \$impact->icon_image",
    'asset($page->founder_1_image)' => "env('BACKEND_URL') . '/' . \$page->founder_1_image",
    'asset($page->founder_2_image)' => "env('BACKEND_URL') . '/' . \$page->founder_2_image",
    'asset($page->cta_image)' => "env('BACKEND_URL') . '/' . \$page->cta_image",
];

foreach ($replacements as $search => $replace) {
    $content = str_replace($search, $replace, $content);
}

file_put_contents($file, $content);
echo "Image URLs patched successfully.";
