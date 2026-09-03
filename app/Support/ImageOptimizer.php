<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use RuntimeException;

class ImageOptimizer
{
    public static function storePortfolioPhoto(string $sourcePath, string $targetDir, string $basename): string
    {
        if (! extension_loaded('gd')) {
            throw new RuntimeException('Image processing is not available on this server.');
        }

        $info = @getimagesize($sourcePath);
        if ($info === false) {
            throw new RuntimeException('The uploaded file is not a valid image.');
        }

        [$width, $height, $type] = $info;
        $source = self::createImage($sourcePath, $type);
        if ($source === false) {
            throw new RuntimeException('Could not read the uploaded image.');
        }

        $max = 1600;
        $scale = min($max / max($width, 1), $max / max($height, 1), 1);
        $targetWidth = max(1, (int) round($width * $scale));
        $targetHeight = max(1, (int) round($height * $scale));

        $canvas = imagecreatetruecolor($targetWidth, $targetHeight);
        if ($canvas === false) {
            imagedestroy($source);
            throw new RuntimeException('Could not prepare the optimized image.');
        }

        $white = imagecolorallocate($canvas, 255, 255, 255);
        imagefill($canvas, 0, 0, $white);

        imagecopyresampled(
            $canvas,
            $source,
            0,
            0,
            0,
            0,
            $targetWidth,
            $targetHeight,
            $width,
            $height
        );

        imagedestroy($source);

        File::ensureDirectoryExists($targetDir);

        $filename = $basename.'.jpg';
        $absolutePath = rtrim($targetDir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$filename;

        if (! imagejpeg($canvas, $absolutePath, 85)) {
            imagedestroy($canvas);
            throw new RuntimeException('Could not save the optimized image.');
        }

        imagedestroy($canvas);

        return 'images/portfolio/'.$filename;
    }

    private static function createImage(string $path, int $type)
    {
        return match ($type) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($path),
            IMAGETYPE_PNG => imagecreatefrompng($path),
            IMAGETYPE_WEBP => function_exists('imagecreatefromwebp') ? imagecreatefromwebp($path) : false,
            IMAGETYPE_GIF => imagecreatefromgif($path),
            default => false,
        };
    }
}
