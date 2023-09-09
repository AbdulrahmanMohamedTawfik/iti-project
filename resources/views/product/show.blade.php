<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
</form>
    <div class="container mt-5">
        <form action="{{ route('product.index') }}" method="get">
            <button class="btn btn-primary">show all products</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product price</th>
                    <th>Product availablity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->availability }}</td>
                    {{-- <td><img src="{{ asset('images/' . $product->product_picture) }}" alt="Image"></td> --}}
                    <td><a href="{{ url()->previous() }}" class="btn btn-secondary">back</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <style>
        button{
            margin-bottom: 5px;
        }
        th{
            padding: 8px;
            border: 1px solid black;
        }
        td{
            padding: 8px;
            border: 1px solid black;
        }
        table{
            border: 1px solid black;
        }
    </style>
</body>

</html>
