<?php

$src = __DIR__ . '/../public/images/live/live-logo.png';
$out = __DIR__ . '/../public/images/live/live-logo-footer.png';

$img = imagecreatefrompng($src);
imagesavealpha($img, true);

$w = imagesx($img);
$h = imagesy($img);
$white = imagecolorallocatealpha($img, 255, 255, 255, 0);

for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgba = imagecolorat($img, $x, $y);
        $a = ($rgba >> 24) & 0x7F;
        $r = ($rgba >> 16) & 0xFF;
        $g = ($rgba >> 8) & 0xFF;
        $b = $rgba & 0xFF;

        if ($a > 100) {
            continue;
        }

        // Dark teal "Linking" + pen -> white for dark footer background.
        if ($g > $r && $b > $r && $g < 120 && $b < 120) {
            imagesetpixel($img, $x, $y, $white);
        }
    }
}

imagepng($img, $out);
imagedestroy($img);

echo "Saved {$out}\n";
