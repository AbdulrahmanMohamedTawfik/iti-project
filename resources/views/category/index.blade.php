<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('category.create') }}" method="get">
            <button class="btn btn-primary">Add category</button>
        </form>
        <form action="{{ route('product.index') }}" method="get">
            <button class="btn btn-primary">show all products</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>category Id</th>
                    <th>category Name</th>
                    <th>category picture</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ asset('images/' . $category->picture) }}" alt="Image"></td>
                        <td>
                            <form action="{{ route('category.show', $category) }}" method="get">
                                <button class="btn btn-primary">Show Products</button>
                            </form>

                            <form action="{{ route('category.update', $category->id) }}">
                                <button class="btn btn-secondary" type="submit">Update</button>
                            </form>

                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

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
