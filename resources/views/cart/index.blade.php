<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="{{ asset('assets/css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Your Online Store</h1>
    </header>
    <nav class="navigator">
        <ul>
            <li><a href="{{ route('user.profile', $uid) }}">Profile</a></li>
            <li><a href="{{ route('category.user_category', $uid) }}">Categories</a></li>
            <li><a href="{{ route('product.user_product', $uid) }}">All Products</a></li>
            <li><a>Cart</a></li>
        </ul>
    </nav>
    <main>
        @foreach ($items as $item)
            <section class="cart">
                <h2>Your Shopping Cart</h2>
                <ul class="cart-items">
                    <li class="cart-item">
                        <img src="{{ asset('images/' . $item->product->picture) }}" alt="Image">
                        <div class="item-details">
                            <h3>Product: {{ $item->product->name }}</h3>
                            <p>Price: {{ $item->product->price }}</p>
                            <p>Quantity: {{ $item->quantity }}</p>
                        </div>
                    </li>
                    <!-- Add more cart items here -->
                </ul>

                <div class="cart-total">
                    <p>Total: {{ $item->total_price }}</p>
                    <form action="{{ route('cart.destroy', ['cid' => $item->id, 'uid' => $uid]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="remove-button" type="submit">Remove</button>
                    </form>
                </div>
            </section>
        @endforeach
    </main>

    <footer>
        <p>&copy; 2023 Your Online Store</p>
    </footer>
</body>

</html>
