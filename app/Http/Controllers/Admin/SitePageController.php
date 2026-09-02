<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SitePage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SitePageController extends Controller
{
    public function index(): View
    {
        $pages = SitePage::query()->orderBy('slug')->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function edit(SitePage $page): View
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, SitePage $page): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'body' => ['nullable', 'string'],
        ]);

        $page->fill($data)->save();

        return redirect()->route('admin.pages.edit', $page)->with('status', 'Page saved.');
    }
}
