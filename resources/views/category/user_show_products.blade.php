<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/user_products.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <title>All Products - Online Store</title>
</head>

<body>
    <nav class="navigator">
        <ul>
            <li><a href="{{ route('user.profile', $uid) }}">Profile</a></li>
            <li><a href="{{ route('category.user_category', $uid) }}">Categories</a></li>
            <li><a href="{{ route('product.user_product', $category) }}">All Products</a></li>
            <li><a href="{{ route('cart.index',$uid ) }}">Cart</a></li>
        </ul>
    </nav>
    <br>
    <h2>All Products</h2>
    <section class="product-list">
        {{-- <h2>All Products</h2> --}}
        @foreach ($products as $product)
            <div class="product">
                {{-- <img src="product.jpg" alt="Product"> --}}
                <img src="{{ asset('images/' . $product->picture) }}" alt="Product">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->availability }}</p>
                <span class="price">${{ $product->price }}</span>
                <a href="#">Add to Cart</a>
            </div>
        @endforeach
    </section>

    <footer>
        <p>&copy; 2023 Online Store</p>
    </footer>
</body>

</html>
