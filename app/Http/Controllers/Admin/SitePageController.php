<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SitePage;
use App\Support\PageSectionDefaults;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SitePageController extends Controller
{
    public function index(): View
    {
        $this->ensurePagesExist();

        $pages = SitePage::query()
            ->whereIn('slug', PageSectionDefaults::slugs())
            ->orderByRaw("FIELD(slug, '".implode("','", PageSectionDefaults::slugs())."')")
            ->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function edit(SitePage $page): View
    {
        $schema = PageSectionDefaults::schema($page->slug);
        $sections = PageSectionDefaults::merge($page->slug, $page->sections);

        return view('admin.pages.form', compact('page', 'schema', 'sections'));
    }

    public function update(Request $request, SitePage $page): RedirectResponse
    {
        $schema = PageSectionDefaults::schema($page->slug);
        $sections = PageSectionDefaults::merge($page->slug, $page->sections);
        $input = $request->input('sections', []);

        foreach ($schema as $section) {
            $sectionId = $section['id'];
            foreach ($section['fields'] as $field) {
                $key = $field['key'];
                $name = "sections.{$sectionId}.{$key}";

                if ($field['type'] === 'image') {
                    if ($request->hasFile("section_files.{$sectionId}.{$key}")) {
                        $file = $request->file("section_files.{$sectionId}.{$key}");
                        $dir = public_path('images/pages/'.$page->slug);
                        if (! is_dir($dir) && ! mkdir($dir, 0755, true) && ! is_dir($dir)) {
                            throw ValidationException::withMessages([
                                $name => 'Could not create image folder on the server.',
                            ]);
                        }
                        $filename = $sectionId.'-'.$key.'-'.time().'.'.$file->getClientOriginalExtension();
                        $file->move($dir, $filename);
                        $sections[$sectionId][$key] = 'images/pages/'.$page->slug.'/'.$filename;
                    }

                    continue;
                }

                if ($field['type'] === 'html' && in_array($page->slug, ['privacy-policy', 'terms-and-conditions'], true)) {
                    $sections[$sectionId][$key] = $request->input('body', $page->body);

                    continue;
                }

                if (array_key_exists($sectionId, $input) && array_key_exists($key, $input[$sectionId])) {
                    $sections[$sectionId][$key] = $input[$sectionId][$key];
                }
            }
        }

        $page->sections = $sections;

        if (in_array($page->slug, ['privacy-policy', 'terms-and-conditions'], true)) {
            $page->body = $request->input('body', $page->body);
            $page->title = $request->input('title', $page->title);
        }

        $page->save();

        return redirect()
            ->route('admin.pages.edit', $page)
            ->with('status', $page->title.' saved.');
    }

    private function ensurePagesExist(): void
    {
        foreach (PageSectionDefaults::slugs() as $slug) {
            SitePage::query()->firstOrCreate(
                ['slug' => $slug],
                [
                    'title' => PageSectionDefaults::titles()[$slug] ?? Str::title(str_replace('-', ' ', $slug)),
                    'body' => in_array($slug, ['privacy-policy', 'terms-and-conditions'], true)
                        ? '<p>Content will be added here.</p>'
                        : null,
                    'sections' => PageSectionDefaults::defaults($slug),
                ]
            );
        }
    }
}
