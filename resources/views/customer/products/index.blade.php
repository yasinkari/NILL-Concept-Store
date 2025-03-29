@extends("layout.layout")
@section("css")
<!-- You can include your custom styles here -->
@endsection

@section('title', 'Our Products')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Our Products</h1>

    @if(isset($message))
        <p>{{ $message }}</p>  <!-- Display the 'No products found' message -->
    @else
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">Price: RM {{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">No products available at the moment.</p>
            </div>
        @endforelse
    </div>
    @endif
</div>
@endsection
