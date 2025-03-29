<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Color;
use App\Models\Product;


class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    // Store the new product in the database
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'variants' => 'required|array',
            'variants.*.color' => 'required|string|max:50',
            'variants.*.size' => 'required|string|max:10',
            'variants.*.stock' => 'required|integer|min:0',
        ]);

        // Handle the image upload (for product image)
        $productImagePath = $request->file('image')->store('product_images', 'public');

        // Prepare the variants data (for the 'details' JSON)
        $variants = [];
        foreach ($request->variants as $variant) {
            $variants[] = [
                'color' => $variant['color'],
                'size' => $variant['size'],
                'stock' => $variant['stock'],
            ];
        }

        // Create the product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $productImagePath,  // Save the product image path
            'details' => ['variants' => $variants],  // Save the variants in the JSON column
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }
  

     // Toggle product visibility
     public function toggleVisibility(Product $product)
     {
         $product->is_visible = !$product->is_visible; // Toggle visibility
         $product->save();
 
         return redirect()->route('products.index')->with('success', 'Product visibility updated successfully');
     }
 
    // Toggle product status
    public function toggleStatus(Product $product)
    {
        // Cycle through the product status based on the current status
        $statusOrder = ['in_stock', 'low_stock', 'out_of_stock'];
        $currentStatusIndex = array_search($product->status, $statusOrder);
        $nextStatusIndex = ($currentStatusIndex + 1) % count($statusOrder); // Loop back to the first status if at the end

        // Update the status
        $product->status = $statusOrder[$nextStatusIndex];
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product status updated successfully');
    }


    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'variants' => 'required|array',
            'variants.*.color' => 'required|string|max:50',
            'variants.*.size' => 'required|string|max:10',
            'variants.*.stock' => 'required|integer|min:0',
        ]);

        // Handle the product image upload (if new image is uploaded)
        if ($request->hasFile('image')) {
            $productImagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $productImagePath;
        }

        // Prepare the variants data (for the 'details' JSON)
        $variants = [];
        foreach ($request->variants as $variant) {
            $variants[] = [
                'color' => $variant['color'],
                'size' => $variant['size'],
                'stock' => $variant['stock'],
            ];
        }

        // Update the product
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'details' => ['variants' => $variants],  // Update variants in the JSON column
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    //delete
    public function destroy(Product $product)
    {
        // Optionally delete images if needed
        // unlink(storage_path('app/public/' . $product->image));
        // foreach ($product->details['variants'] as $variant) {
        //     unlink(storage_path('app/public/' . $variant['image']));
        // }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }


    //customer display
    public function showToCustomer()
    {
        // Retrieve all visible products
        $products = Product::where('is_visible', true)->get();
    
        // Debugging: Check the query result
        if ($products->isEmpty()) {
            return view('customer.products.index', ['message' => 'No products found.']);
        }
    
        // Pass products to the view
        return view('customer.products.index', compact('products'));
    }
    

}
