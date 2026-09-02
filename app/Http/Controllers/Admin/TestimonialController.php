<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::query()->orderBy('context')->orderBy('sort_order')->paginate(20);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial(['context' => 'home', 'sort_order' => 0])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $testimonial = new Testimonial;
        $this->persist($request, $testimonial);

        return redirect()->route('admin.testimonials.edit', $testimonial)->with('status', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $this->persist($request, $testimonial);

        return redirect()->route('admin.testimonials.edit', $testimonial)->with('status', 'Testimonial saved.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted.');
    }

    private function persist(Request $request, Testimonial $testimonial): void
    {
        $data = $request->validate([
            'quote' => ['nullable', 'string'],
            'name' => ['required', 'string', 'max:120'],
            'role' => ['required', 'string', 'max:160'],
            'context' => ['required', 'in:home,services'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'intro' => ['nullable', 'string'],
            'outro' => ['nullable', 'string'],
            'meta' => ['nullable', 'string', 'max:160'],
            'bullets' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image', 'max:4096'],
        ]);

        $payload = [];
        if ($data['context'] === 'services') {
            $payload = array_filter([
                'intro' => $data['intro'] ?? null,
                'outro' => $data['outro'] ?? null,
                'meta' => $data['meta'] ?? null,
                'bullets' => collect(preg_split("/\r\n|\n|\r/", (string) ($data['bullets'] ?? '')) ?: [])
                    ->map(fn ($line) => trim($line))
                    ->filter()
                    ->values()
                    ->all() ?: null,
            ]);
        }

        if ($request->hasFile('avatar')) {
            $dir = public_path('images/testimonials');
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $file = $request->file('avatar');
            $name = 'testimonial-'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/testimonials'), $name);
            $testimonial->avatar = 'images/testimonials/'.$name;
        }

        $testimonial->fill([
            'quote' => $data['quote'] ?? '',
            'name' => $data['name'],
            'role' => $data['role'],
            'context' => $data['context'],
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'payload' => $payload ?: null,
        ])->save();
    }
}
