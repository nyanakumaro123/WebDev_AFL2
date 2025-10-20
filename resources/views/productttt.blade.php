<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td>No</td>
                <td>Product</td>
                <td>Color</td>
                <td>Size</td>
                <td>Brand</td>
                <td>Brand Country</td>
            </tr>
        </thead>
        @foreach ($allproducts as $product)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_color }}</td>
                <td>{{ $product->product_size }}</td>
                <td><a href="brand">{{ $product->brand->brand_name }}</a></td>
                <td>{{ $product->brand->brand_manufacturing_country }}</td>
            </tr>
        @endforeach

    </table>
    {{-- <a href="brandddd">Brand</a> --}}
</body>

</html>
