<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/profile_style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <title>User Profile</title>
</head>
<body>
    <nav class="navigator">
        <ul>
            <li><a>Profile</a></li>
            {{-- <li><a href="{{ route('category.user_category, $user') }}">Categories</a></li> --}}
            <li><a href="{{ route('category.user_category',$user) }}">Categories</a></li>
            <li><a href="{{ route('product.user_product',$user ) }}">All Products</a></li>
            <li><a href="{{ route('cart.index',$user ) }}">Cart</a></li>
        </ul>
    </nav>
    <br>
    <header>
        <h1>User Profile</h1>
    </header>

    <main class="profile">
        <section class="user-info">
            <h2>User Information</h2>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            {{-- <p><strong>Address:</strong> 123 Main St, City, Country</p> --}}
        </section>
        <br>
        <section class="account-settings">
            {{-- <h2>Account Settings</h2>
            <p><strong>Change Password</strong></p>
            <p><strong>Update Email</strong></p> --}}
            <!-- Add more account settings options as needed -->
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Online Store</p>
    </footer>
</body>
</html>
