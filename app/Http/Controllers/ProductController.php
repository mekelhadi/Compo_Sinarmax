<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * DISPLAY ALL PRODUCTS
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * SHOW CREATE PAGE
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * STORE PRODUCT
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // UPLOAD IMAGE
        $validated['thumbnail'] = $request->file('thumbnail')
            ->store('products', 'public');

        // SAVE PRODUCT
        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * SHOW EDIT PAGE
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * UPDATE PRODUCT
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /**
         * UPDATE IMAGE
         */
        if ($request->hasFile('thumbnail')) {

            // DELETE OLD IMAGE
            if ($product->thumbnail &&
                Storage::disk('public')->exists($product->thumbnail)) {

                Storage::disk('public')->delete($product->thumbnail);
            }

            // STORE NEW IMAGE
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('products', 'public');
        }

        // UPDATE PRODUCT
        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product berhasil diupdate');
    }

    /**
     * DELETE PRODUCT
     */
    public function destroy(Product $product)
    {
        // DELETE IMAGE
        if ($product->thumbnail &&
            Storage::disk('public')->exists($product->thumbnail)) {

            Storage::disk('public')->delete($product->thumbnail);
        }

        // DELETE PRODUCT
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product berhasil dihapus');
    }
}