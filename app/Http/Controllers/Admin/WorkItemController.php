<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class WorkItemController extends Controller
{
    public function index(): View
    {
        $items = WorkItem::query()->orderBy('sort_order')->paginate(20);

        return view('admin.work.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.work.form', ['item' => new WorkItem(['sort_order' => 0])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $item = new WorkItem;
        $this->persist($request, $item);

        return redirect()->route('admin.work.edit', $item)->with('status', 'Case study created.');
    }

    public function edit(WorkItem $work): View
    {
        return view('admin.work.form', ['item' => $work]);
    }

    public function update(Request $request, WorkItem $work): RedirectResponse
    {
        $this->persist($request, $work);

        return redirect()->route('admin.work.edit', $work)->with('status', 'Case study saved.');
    }

    public function destroy(WorkItem $work): RedirectResponse
    {
        $work->delete();

        return redirect()->route('admin.work.index')->with('status', 'Case study deleted.');
    }

    private function persist(Request $request, WorkItem $item): void
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:220'],
            'slug' => ['nullable', 'string', 'max:220'],
            'category' => ['nullable', 'string', 'max:80'],
            'client' => ['nullable', 'string', 'max:120'],
            'role' => ['nullable', 'string', 'max:160'],
            'text' => ['nullable', 'string', 'max:220'],
            'result' => ['nullable', 'string', 'max:300'],
            'body' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $slug = $data['slug'] ?: Str::slug($data['title']);
        $slug = Str::slug($slug) ?: 'case-study';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $slug.'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/work'), $name);
            $item->image = 'images/work/'.$name;
        }

        $item->fill([
            'slug' => $slug,
            'title' => $data['title'],
            'category' => $data['category'] ?? null,
            'client' => $data['client'] ?? null,
            'role' => $data['role'] ?? null,
            'text' => $data['text'] ?? null,
            'result' => $data['result'] ?? null,
            'body' => $data['body'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ])->save();
    }
}
