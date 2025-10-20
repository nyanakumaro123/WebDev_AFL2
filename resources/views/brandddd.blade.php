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
                <td>Brand</td>
                <td>Establishment Date</td>
                <td>Country</td>
            </tr>
        </thead>
        @foreach ($allbrands as $brand)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $brand->brand_name }}</td>
                <td>{{ $brand->brand_establishment_date }}</td>
                <td>{{ $brand->brand_manufacturing_country }}</td>
            </tr>
        @endforeach

    </table>
</body>

</html>
