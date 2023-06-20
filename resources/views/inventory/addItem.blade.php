<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Add Item</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="my-3">Add item</h2>
            <a href="inventory.index" class="btn btn-danger">Cancel</a>
        </div>
        <div>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        //item form
        <form method="post" action="{{route('inventory.create')}}">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="name" class="form-label">Item:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity(pcs):</label>
                <input type="number" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price (RM):</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="expirydate" class="form-label">Expiry date:</label>
                <input type="date" class="form-control" id="expirydate" name="expirydate">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Add Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
