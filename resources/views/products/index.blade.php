<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Produkte</title>
</head>
<body>

    <h1>Produkte</h1>

    @foreach ($products as $product)
        <p>{{ $product->title }}</p>
    @endforeach

</body>
</html> 