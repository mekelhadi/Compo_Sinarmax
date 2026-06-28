<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('key')->paginate(20);
        return view('admin.contents.index', compact('contents'));
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        $request->validate([
            'value' => 'nullable|string',
        ]);

        $content->update(['value' => $request->value]);

        return redirect()->route('admin.contents.index')->with('success', 'Content updated successfully');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'key' => 'required|string',
        ]);

        $path = $request->file('image')->store('cms', 'public');

        Content::updateOrCreate(
            ['key' => $request->key],
            ['value' => $path]
        );

        return redirect()->route('admin.contents.index')->with('success', 'Image uploaded successfully');
    }

    public function create()
    {
        return view('admin.contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:contents,key',
            'value' => 'nullable|string',
        ]);

        Content::create($request->only('key', 'value'));

        return redirect()->route('admin.contents.index')->with('success', 'Content created successfully');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('admin.contents.index')->with('success', 'Content deleted successfully');
    }
}
