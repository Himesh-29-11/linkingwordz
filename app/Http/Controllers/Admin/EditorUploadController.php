<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\ImageOptimizer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EditorUploadController extends Controller
{
    public function store(Request $request): JsonResponse|Response
    {
        $request->validate([
            'upload' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp,avif', 'max:8192'],
        ]);

        try {
            $relative = $this->storeImage($request->file('upload'));
            $url = asset($relative);
        } catch (\Throwable $exception) {
            if ($request->filled('CKEditorFuncNum')) {
                $message = addslashes($exception->getMessage() ?: 'Image upload failed.');

                return response(
                    '<script>window.parent.CKEDITOR.tools.callFunction('
                    .(int) $request->input('CKEditorFuncNum')
                    .", '', '{$message}');</script>"
                )->header('Content-Type', 'text/html; charset=utf-8');
            }

            return response()->json([
                'uploaded' => 0,
                'error' => ['message' => $exception->getMessage() ?: 'Image upload failed.'],
            ], 422);
        }

        if ($request->filled('CKEditorFuncNum')) {
            $escapedUrl = addslashes($url);

            return response(
                '<script>window.parent.CKEDITOR.tools.callFunction('
                .(int) $request->input('CKEditorFuncNum')
                .", '{$escapedUrl}', '');</script>"
            )->header('Content-Type', 'text/html; charset=utf-8');
        }

        return response()->json([
            'uploaded' => 1,
            'fileName' => basename($relative),
            'url' => $url,
        ]);
    }

    private function storeImage(\Illuminate\Http\UploadedFile $file): string
    {
        $subdir = 'images/uploads/'.now()->format('Y/m');
        $basename = Str::uuid()->toString();

        if (extension_loaded('gd')) {
            $filename = ImageOptimizer::storeEditorImage(
                $file->getRealPath(),
                public_path($subdir),
                $basename
            );

            return $subdir.'/'.$filename;
        }

        $dir = public_path($subdir);
        File::ensureDirectoryExists($dir);
        $extension = strtolower($file->getClientOriginalExtension() ?: 'jpg');
        $filename = $basename.'.'.$extension;
        $file->move($dir, $filename);

        return $subdir.'/'.$filename;
    }
}
