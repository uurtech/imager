<?php

$root = __DIR__ . DIRECTORY_SEPARATOR;
require $root . "vendor/autoload.php";

// if (count($argv) < 2) {
//     echo "php imager /tam/klasör/yolu/ şeklinde çalıştırın";
//     return;
//
;
$file = ''; //file that you wanna compress
$new_name_image = ''; //name of new file compressed
$quality = 80; // Value that I chose
$pngQuality = 9; // Exclusive for PNG files
$destination = ''; //This destination must be exist on your project
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
