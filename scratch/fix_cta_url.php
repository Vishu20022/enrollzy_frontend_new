<?php
$files = glob('c:/xampp/htdocs/enrollzy_frontend_new/resources/views/pages/home-sections/*.blade.php');
foreach ($files as $file) {
    $c = file_get_contents($file);
    // Find {{ $section->cta_url ?? '{{ route(' }}'pages.organisations') }}"
    // We want to replace {{ $section->cta_url ?? '{{ something }}' }} with {{ $section->cta_url ?? something }}
    
    // Also the regex might have produced something like:
    // {{ $section->cta_url ?? '{{ route(' }}'pages.organisations') }}"
    
    // Actually let's just do str_replace for the exact broken string in university_grid.blade.php
    $c = str_replace(
        "{{ \$section->cta_url ?? '{{ route(' }}'pages.organisations') }}\"",
        "{{ \$section->cta_url ?? route('pages.organisations') }}\"",
        $c
    );
    file_put_contents($file, $c);
}
