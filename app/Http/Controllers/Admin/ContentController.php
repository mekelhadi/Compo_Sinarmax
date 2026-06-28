<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    private function getSections()
    {
        return [
            'Meta' => [
                'label' => 'Meta & SEO',
                'keys' => ['home_meta_'],
            ],
            'Company Profile' => [
                'label' => 'Company Profile Video',
                'keys' => ['home_company_profile_'],
            ],
            'Business Plan' => [
                'label' => 'Business Plan',
                'keys' => ['home_bp'],
            ],
            'Featured Products' => [
                'label' => 'Featured Products',
                'keys' => ['home_featured_title'],
            ],
            'Clients' => [
                'label' => 'Our Clients',
                'keys' => ['home_clients_'],
            ],
            'Services' => [
                'label' => 'Our Services',
                'keys' => ['home_s', 'home_services_title'],
            ],
            'News' => [
                'label' => 'Latest News',
                'keys' => ['home_news'],
            ],
            'Contact CTA' => [
                'label' => 'Contact CTA',
                'keys' => ['home_contact_cta_'],
            ],
            'Gallery' => [
                'label' => 'Gallery',
                'keys' => ['home_gallery_'],
            ],
            'FAQ' => [
                'label' => 'FAQ',
                'keys' => ['faq_'],
            ],
        ];
    }

    public function index(Request $request)
    {
        $contents = Content::orderBy('key')->get();
        $sections = $this->getSections();
        $activeSection = $request->query('section');

        $sectionData = [];
        foreach ($sections as $sectionKey => $section) {
            $items = $contents->filter(function ($c) use ($section) {
                foreach ($section['keys'] as $prefix) {
                    if (str_starts_with($c->key, $prefix)) {
                        return true;
                    }
                }
                return false;
            });

            if ($items->count() > 0) {
                $sectionData[$sectionKey] = [
                    'label' => $section['label'],
                    'items' => $items,
                ];
            }
        }

        if ($activeSection && isset($sectionData[$activeSection])) {
            $sectionData = [$activeSection => $sectionData[$activeSection]];
        }

        return view('admin.contents.index', compact('sectionData'));
    }

    public function edit(Content $content)
    {
        return view('admin.contents.edit', compact('content'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $mime = $file->getMimeType();
            $base64 = 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($file->getRealPath()));
            $content->update(['value' => $base64]);
        } elseif ($request->filled('value')) {
            $content->update(['value' => $request->value]);
        }

        return redirect()->route('admin.contents.index')->with('success', 'Content "' . $content->key . '" updated successfully.');
    }
}
