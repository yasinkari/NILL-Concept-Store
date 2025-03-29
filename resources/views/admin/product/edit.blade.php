@extends('layout.admin_layout')
@section('title', 'Edit Product')

@section('content')
<h1 class="mb-4">Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')  <!-- This ensures it is a PUT request for updating -->
    
    <!-- Product Name -->
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" id="image" name="image" class="form-control">
        @if($product->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" height="100">
                <p>Current Image</p>
            </div>
        @endif
    </div>

    <!-- Variants Section -->
    <h3>Product Variants</h3>
    <div id="variant-fields">
        @foreach ($product->details['variants'] as $key => $variant)
        <div class="variant mb-4 p-3 border rounded shadow-sm">
            <h5>Variant {{ $key + 1 }}</h5>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="variants[{{ $key }}][color]" class="form-control" value="{{ old('variants.' . $key . '.color', $variant['color']) }}" required>
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" name="variants[{{ $key }}][size]" class="form-control" value="{{ old('variants.' . $key . '.size', $variant['size']) }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="variants[{{ $key }}][stock]" class="form-control" value="{{ old('variants.' . $key . '.stock', $variant['stock']) }}" required>
            </div>
        </div>
        @endforeach
    </div>

    <button type="button" class="btn btn-outline-secondary" onclick="addVariant()">Add Another Variant</button>

    <br><br>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<script>
    let variantCount = {{ count($product->details['variants']) }};
    function addVariant() {
        let variantHTML = `
            <div class="variant mb-4 p-3 border rounded shadow-sm">
                <h5>Variant ${variantCount + 1}</h5>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="variants[${variantCount}][color]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" name="variants[${variantCount}][size]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="variants[${variantCount}][stock]" class="form-control" required>
                </div>
            </div>
        `;
        document.getElementById('variant-fields').insertAdjacentHTML('beforeend', variantHTML);
        variantCount++;
    }
</script>

@endsection
