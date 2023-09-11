<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <input type="text" name="name" placeholder="product name">
                <input type="text" name="price" placeholder="product price">
                <input type="text" name="availability" placeholder="product availability">
                <input type="text" name="category_id" placeholder="category id">
                <input type="text" name="admin_id" placeholder="admin id">
                <input class="btn btn-secondary" type="file" name="picture">
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
    </style>
</body>

</html>
