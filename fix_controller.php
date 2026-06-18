<?php
$file = 'app/Http/Controllers/PageController.php';
$content = file_get_contents($file);

$method = <<<EOT

    public function aboutUs()
    {
        \$page = \App\Models\AboutUsPage::first();
        \$offers = \App\Models\AboutUsOffer::orderBy('sort_order')->get();
        \$features = \App\Models\AboutUsFeature::orderBy('sort_order')->get();
        \$impacts = \App\Models\AboutUsImpact::orderBy('sort_order')->get();
        return view('pages.about-us', compact('page', 'offers', 'features', 'impacts'));
    }
}
EOT;

$content = preg_replace('/}\s*$/', $method, $content);
file_put_contents($file, $content);
echo "Patched successfully.";
