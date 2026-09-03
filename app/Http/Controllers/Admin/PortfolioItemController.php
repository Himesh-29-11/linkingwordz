<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Support\ImageOptimizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PortfolioItemController extends Controller
{
    public function index(): View
    {
        $items = PortfolioItem::query()->orderBy('sort_order')->paginate(20);

        return view('admin.portfolio.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.portfolio.form', [
            'item' => new PortfolioItem(['sort_order' => 0, 'is_published' => true]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $item = new PortfolioItem;
        $this->persist($request, $item);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('status', 'Portfolio item created for '.$item->client_name.'.');
    }

    public function edit(PortfolioItem $portfolioItem): View
    {
        return view('admin.portfolio.form', ['item' => $portfolioItem]);
    }

    public function update(Request $request, PortfolioItem $portfolioItem): RedirectResponse
    {
        $this->persist($request, $portfolioItem);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('status', 'Portfolio item saved for '.$portfolioItem->client_name.'.');
    }

    public function destroy(PortfolioItem $portfolioItem): RedirectResponse
    {
        $this->deleteDocuments($portfolioItem->documents ?? []);
        $portfolioItem->delete();

        return redirect()->route('admin.portfolio.index')->with('status', 'Portfolio item deleted.');
    }

    private function persist(Request $request, PortfolioItem $item): void
    {
        $request->merge([
            'website_url' => $this->normalizeUrl($request->input('website_url')),
        ]);

        $data = $request->validate([
            'client_name' => ['required', 'string', 'max:160'],
            'website_url' => ['nullable', 'url', 'max:500'],
            'summary' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,webp,avif', 'max:8192'],
            'document_files' => ['nullable', 'array'],
            'document_files.*' => ['nullable', 'file', 'max:20480'],
            'remove_documents' => ['nullable', 'array'],
            'remove_documents.*' => ['integer', 'min:0'],
        ], [
            'client_name.required' => 'Please enter the client name.',
            'website_url.url' => 'Website link must be a valid URL (example: https://client.com).',
            'photo.mimes' => 'Photo must be a JPG, PNG, GIF, or WebP image.',
            'photo.max' => 'Photo is too large. Maximum size is 8 MB.',
            'document_files.*.max' => 'Each document must be 20 MB or smaller.',
        ]);

        $slug = Str::slug($data['client_name']) ?: 'client';

        try {
            $documents = $this->syncDocuments($item, $request, $slug);

            if ($request->hasFile('photo')) {
                if ($item->photo) {
                    $old = public_path($item->photo);
                    if (is_file($old)) {
                        @unlink($old);
                    }
                }

                $item->photo = ImageOptimizer::storePortfolioPhoto(
                    $request->file('photo')->getPathname(),
                    public_path('images/portfolio'),
                    $slug.'-'.time()
                );
            }

            $item->fill([
                'client_name' => $data['client_name'],
                'website_url' => $data['website_url'] ?? null,
                'summary' => $data['summary'] ?? null,
                'documents' => $documents,
                'sort_order' => (int) ($data['sort_order'] ?? 0),
                'is_published' => $request->boolean('is_published'),
            ])->save();
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw ValidationException::withMessages([
                'client_name' => 'Could not save this portfolio item. Check file uploads and try again.',
            ]);
        }
    }

    private function normalizeUrl(mixed $url): ?string
    {
        $url = trim((string) $url);
        if ($url === '') {
            return null;
        }

        if (! preg_match('/^https?:\/\//i', $url)) {
            $url = 'https://'.ltrim($url, '/');
        }

        return $url;
    }

    private function syncDocuments(PortfolioItem $item, Request $request, string $slug): array
    {
        $documents = array_values($item->documents ?? []);

        foreach ($request->input('remove_documents', []) as $index) {
            if (! isset($documents[$index])) {
                continue;
            }

            $path = public_path($documents[$index]['path'] ?? '');
            if ($path !== '' && is_file($path)) {
                @unlink($path);
            }

            unset($documents[$index]);
        }

        $documents = array_values($documents);

        if ($request->hasFile('document_files')) {
            $dir = public_path('documents/portfolio');
            if (! is_dir($dir) && ! mkdir($dir, 0755, true) && ! is_dir($dir)) {
                throw ValidationException::withMessages([
                    'document_files' => 'Could not create the portfolio documents folder on the server.',
                ]);
            }

            foreach ($request->file('document_files') as $file) {
                if (! $file || ! $file->isValid()) {
                    continue;
                }

                $ext = $file->getClientOriginalExtension() ?: $file->extension() ?: 'bin';
                $name = $slug.'-'.Str::random(8).'-'.time().'.'.$ext;
                $file->move($dir, $name);

                $documents[] = [
                    'path' => 'documents/portfolio/'.$name,
                    'original_name' => $file->getClientOriginalName(),
                    'label' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'mime' => $file->getClientMimeType(),
                ];
            }
        }

        return $documents;
    }

    private function deleteDocuments(array $documents): void
    {
        foreach ($documents as $document) {
            $path = public_path($document['path'] ?? '');
            if ($path !== '' && is_file($path)) {
                @unlink($path);
            }
        }
    }
}
