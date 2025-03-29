@extends('layout.admin_layout')

@section('title', 'Product List')

@section('content')
    <h1>Product List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Visibility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <!-- Display the product image -->
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" height="100">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form action="{{ route('products.toggleStatus', $product->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">
                                {{ ucfirst(str_replace('_', ' ', $product->status)) }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('products.toggleVisibility', $product->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-info">
                                {{ $product->is_visible ? 'Visible' : 'Hidden' }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    
                        <!-- Delete Form -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
