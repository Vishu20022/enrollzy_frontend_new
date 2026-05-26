<?php

$dir = 'c:/xampp/htdocs/enrollzy_frontend_new/resources/views/pages/home-sections/';
$files = glob($dir . '*.blade.php');

foreach ($files as $file) {
    $content = file_get_contents($file);

    // Replace first <h2>...</h2> that contains main-heading
    $content = preg_replace_callback(
        '/(<h2[^>]*main-heading[^>]*>)(.*?)(<\/h2>)/is',
        function ($matches) {
            $inner = trim($matches[2]);
            // If it already has $section->title, skip
            if (strpos($inner, '$section->title') !== false) {
                return $matches[0];
            }
            return $matches[1] . "\n                {!! \$section->title ?? '" . addslashes($inner) . "' !!}\n            " . $matches[3];
        },
        $content,
        1 // limit to 1 replacement
    );

    // Replace first <p class="featured-desc">...</p>
    $content = preg_replace_callback(
        '/(<p[^>]*featured-desc[^>]*>)(.*?)(<\/p>)/is',
        function ($matches) {
            $inner = trim($matches[2]);
            if (strpos($inner, '$section->subtitle') !== false) {
                return $matches[0];
            }
            return "@if(\$section->subtitle)\n            " . $matches[1] . "\n                {{ \$section->subtitle }}\n            " . $matches[3] . "\n        @else\n            " . $matches[1] . "\n                " . $inner . "\n            " . $matches[3] . "\n        @endif";
        },
        $content,
        1
    );

    // Find CTA buttons (commonly "View More")
    // e.g. <a href="..." class="btn-theme-1">View More</a>
    // We will look for <a> tags containing "View More" or similar and replace them.
    // Actually, "View All" or "View More" is common. Let's just find <a ...>View ...</a>
    $content = preg_replace_callback(
        '/(<a\s+[^>]*href=["\'])([^"\']+)(["\'][^>]*>)\s*(View[^<]+)\s*(<\/a>)/is',
        function ($matches) {
            $url = $matches[2];
            $text = trim($matches[4]);
            if (strpos($text, '$section->cta_title') !== false) {
                return $matches[0];
            }
            return $matches[1] . "{{ \$section->cta_url ?? '" . $url . "' }}" . $matches[3] . "\n                {{ \$section->cta_title ?? '" . addslashes($text) . "' }}\n            " . $matches[5];
        },
        $content
    );

    file_put_contents($file, $content);
    echo "Processed " . basename($file) . "\n";
}
