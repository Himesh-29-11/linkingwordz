<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Cms;
use App\Support\CmsDefaults;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.form', [
            'contact' => [
                'email' => Cms::contact('email'),
                'connect_email' => Cms::contact('connect_email'),
                'phone' => Cms::contact('phone'),
                'whatsapp' => Cms::contact('whatsapp'),
                'address' => Cms::contact('address'),
                'instagram' => Cms::contact('instagram'),
                'facebook' => Cms::contact('facebook'),
                'linkedin' => Cms::contact('linkedin'),
            ],
            'homeSections' => [
                'featured_services' => json_encode(Cms::homeSection('featured_services'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
                'audience_cards' => json_encode(Cms::homeSection('audience_cards'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
                'problems' => json_encode(Cms::homeSection('problems'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
                'why_blocks' => json_encode(Cms::homeSection('why_blocks'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
                'process_steps' => json_encode(Cms::homeSection('process_steps'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            ],
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:160'],
            'connect_email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'whatsapp' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:220'],
            'instagram' => ['nullable', 'url', 'max:220'],
            'facebook' => ['nullable', 'url', 'max:220'],
            'linkedin' => ['nullable', 'url', 'max:220'],
            'featured_services' => ['nullable', 'string'],
            'audience_cards' => ['nullable', 'string'],
            'problems' => ['nullable', 'string'],
            'why_blocks' => ['nullable', 'string'],
            'process_steps' => ['nullable', 'string'],
        ]);

        foreach (['email', 'connect_email', 'phone', 'whatsapp', 'address', 'instagram', 'facebook', 'linkedin'] as $key) {
            Cms::saveSetting('contact.'.$key, $data[$key] ?? CmsDefaults::contact($key));
        }

        foreach (['featured_services', 'audience_cards', 'problems', 'why_blocks', 'process_steps'] as $key) {
            $raw = trim((string) ($data[$key] ?? ''));
            if ($raw === '') {
                continue;
            }

            $decoded = json_decode($raw, true);
            if (! is_array($decoded)) {
                return back()->withErrors([$key => 'Invalid JSON. Please check the format.'])->withInput();
            }

            Cms::saveSetting('home.'.$key, $decoded, 'json');
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Site settings saved.');
    }
}
