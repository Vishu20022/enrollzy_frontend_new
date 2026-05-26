<?php

$dir = 'c:/xampp/htdocs/enrollzy_frontend_new/resources/views/pages/home-sections/';

function fixFile($filename, $prepend, $append) {
    global $dir;
    $path = $dir . $filename;
    if (!file_exists($path)) {
        echo "Not found: $path\n";
        return;
    }
    
    $content = file_get_contents($path);
    $lines = explode("\n", $content);
    
    // Remove dangling @if from the end of the file
    for ($i = count($lines)-1; $i >= count($lines)-5; $i--) {
        if (isset($lines[$i]) && strpos(trim($lines[$i]), '@if') === 0) {
            unset($lines[$i]);
            break;
        }
    }
    
    $content = implode("\n", $lines);
    
    // Add missing prepend and append
    if ($prepend) {
        if (strpos($content, trim($prepend)) === false) {
            $content = $prepend . "\n" . ltrim($content);
        }
    }
    if ($append) {
        $content = rtrim($content) . "\n" . $append . "\n";
    }
    
    file_put_contents($path, $content);
    echo "Fixed $filename\n";
}

fixFile('exams.blade.php', '@if ($exams->count() > 0)', '@endif');
fixFile('noteworthy_mentions.blade.php', '@if ($noteworthy_categories->count() > 0)', '@endif');
fixFile('testimonials.blade.php', '@if ($testimonials->count() > 0)', '@endif');
fixFile('ques_ans.blade.php', '@if ($faqs->count() > 0)', '@endif');
fixFile('blogs.blade.php', '@if ($blogs->count() > 0)', '@endif');
fixFile('faq.blade.php', '@if ($faqs->count() > 0)', '@endif');
fixFile('talk_to_alumni.blade.php', '@if ($site_alumni->count() > 0)', '@endif');

