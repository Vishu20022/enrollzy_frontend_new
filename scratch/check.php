<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$exam = \App\Models\DynamicExam::where('slug', 'national-eligibility-cum-entrance-test-undergraduate')->first();
if ($exam) {
    foreach($exam->sections as $s) {
        if (is_array($s->content)) {
            echo "Heading: " . $s->heading . "\n";
            print_r($s->content);
        }
    }
}
