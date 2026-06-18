<?php
$files = [
    'c:\\xampp\\htdocs\\enrollzy_frontend_new\\resources\\views\\pages\\home-sections\\school_marquee.blade.php',
    'c:\\xampp\\htdocs\\enrollzy_frontend_new\\resources\\views\\pages\\home-sections\\institute_marquee.blade.php'
];

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);

    $search = <<<EOT
                        <img src="{{ env('BACKEND_URL') . '/' . \$marquee->logo }}" alt="{{ \$marquee->name }}">
EOT;
    $replace = <<<EOT
                        @if(\$marquee->logo_url)
                            <a href="{{ \$marquee->logo_url }}" target="_blank">
                                <img src="{{ env('BACKEND_URL') . '/' . \$marquee->logo }}" alt="{{ \$marquee->name }}">
                            </a>
                        @else
                            <img src="{{ env('BACKEND_URL') . '/' . \$marquee->logo }}" alt="{{ \$marquee->name }}">
                        @endif
EOT;

    $content = str_replace($search, $replace, $content);
    file_put_contents($file, $content);
}

echo "Frontend views updated successfully.";
