@extends('layout.admin_layout')
@section('title', 'Add Product')

@section('content')
<h1 class="mb-4">Add New Product</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Product Name -->
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" id="image" name="image" class="form-control" required>
    </div>

    <!-- Variants Section -->
    <h3>Product Variants</h3>
    <div id="variant-fields">
        <!-- Variant input fields will be dynamically added here -->
        <div class="variant mb-4 p-3 border rounded shadow-sm">
            <h5>Variant 1</h5>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="variants[0][color]" class="form-control" value="{{ old('variants.0.color') }}" required>
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" name="variants[0][size]" class="form-control" value="{{ old('variants.0.size') }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="variants[0][stock]" class="form-control" value="{{ old('variants.0.stock') }}" required>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-outline-secondary" onclick="addVariant()">Add Another Variant</button>

    <br><br>
    <button type="submit" class="btn btn-primary">Save Product</button>
</form>

<script>
    let variantCount = 1;

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
