<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::query()->orderBy('sort_order')->paginate(20);

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.form', ['service' => new Service(['sort_order' => 0, 'audience' => 'Authors'])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $service = new Service;
        $this->persist($request, $service);

        return redirect()->route('admin.services.edit', $service)->with('status', 'Service created.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $this->persist($request, $service);

        return redirect()->route('admin.services.edit', $service)->with('status', 'Service saved.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('status', 'Service deleted.');
    }

    private function persist(Request $request, Service $service): void
    {
        $data = $request->validate([
            'audience' => ['required', 'string', 'max:40'],
            'title' => ['required', 'string', 'max:160'],
            'href' => ['required', 'string', 'max:220'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $service->fill([
            'audience' => $data['audience'],
            'title' => $data['title'],
            'href' => $data['href'],
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ])->save();
    }
}
