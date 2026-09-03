<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        return redirect()->route('admin.portfolio.edit', $item)->with('status', 'Portfolio item created.');
    }

    public function edit(PortfolioItem $portfolioItem): View
    {
        return view('admin.portfolio.form', ['item' => $portfolioItem]);
    }

    public function update(Request $request, PortfolioItem $portfolioItem): RedirectResponse
    {
        $this->persist($request, $portfolioItem);

        return redirect()->route('admin.portfolio.edit', $portfolioItem)->with('status', 'Portfolio item saved.');
    }

    public function destroy(PortfolioItem $portfolioItem): RedirectResponse
    {
        $this->deleteDocuments($portfolioItem->documents ?? []);
        $portfolioItem->delete();

        return redirect()->route('admin.portfolio.index')->with('status', 'Portfolio item deleted.');
    }

    private function persist(Request $request, PortfolioItem $item): void
    {
        $data = $request->validate([
            'client_name' => ['required', 'string', 'max:160'],
            'website_url' => ['nullable', 'url', 'max:500'],
            'summary' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'photo' => ['nullable', 'image', 'max:4096'],
            'document_files' => ['nullable', 'array'],
            'document_files.*' => ['file', 'mimes:pdf,doc,docx,txt,rtf,xls,xlsx,ppt,pptx', 'max:15360'],
            'remove_documents' => ['nullable', 'array'],
            'remove_documents.*' => ['integer', 'min:0'],
        ]);

        $slug = Str::slug($data['client_name']) ?: 'client';
        $documents = $this->syncDocuments($item, $request, $slug);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $slug.'-'.time().'.'.$file->getClientOriginalExtension();
            $dir = public_path('images/portfolio');
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $file->move($dir, $name);
            $item->photo = 'images/portfolio/'.$name;
        }

        $item->fill([
            'client_name' => $data['client_name'],
            'website_url' => $data['website_url'] ?? null,
            'summary' => $data['summary'] ?? null,
            'documents' => $documents,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_published' => $request->boolean('is_published'),
        ])->save();
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
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            foreach ($request->file('document_files') as $file) {
                $ext = $file->getClientOriginalExtension();
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
