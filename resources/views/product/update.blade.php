<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('product.edit', $product->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                @method('PUT')
                @csrf
                <input type="text" name="product_name" value="{{ $product->product_name }}">
                <img src="{{ asset('images/' . $product->picture) }}" alt="Image">
                <input class="btn btn-secondary" type="file" name="product_picture">
                <input type="text" name="product_availability" value="{{ $product->product_availability }}">
                <input type="text" name="product_price" value="{{ $product->product_price }}">
                <input type="text" name="category_id" value="{{ $product->category_id }}">
                <input type="text" name="admin_id" value="{{ $product->admin_id }}">
                <br>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
        <button class="btn btn-secondary" onclick="location='/products'">back</button>
    </div>
    <style>
        button{
            margin-bottom: 5px;
        }
        input{
            border: 1px solid black;
            border-radius: 10px;
        }
        img{
            padding: 5px;
            padding-bottom: 10px;
        }
    </style>
</body>

</html>
