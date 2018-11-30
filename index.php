<?php

$root = __DIR__ . DIRECTORY_SEPARATOR;
require $root . "vendor/autoload.php";

$images = glob($root . 'images/*.{jpeg,jpg,png,JPG,PNG,JPEG}', GLOB_BRACE);

if (!file_exists('compressed')) {
    mkdir($root . 'compressed', 0777, true);
}

foreach ($images as $image) {
    $file = $image;
    $name = $image;
    $image = new \Gumlet\ImageResize($file);
    $image->scale(70);

    $image->save(str_replace("images/", "compressed/", $file));
    echo "Oluşturuldu. " . $name . "\n";

}
