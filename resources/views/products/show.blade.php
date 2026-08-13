<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="container py-5">

        <h1>{{ $product->title }}</h1>

        <p>{{ $product->description }}</p>

        <p>
            <strong>Aktuelles Gebot:</strong>
            {{ $product->current_price }} €
        </p>

    </div>

</body>
</html>