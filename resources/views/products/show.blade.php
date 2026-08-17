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
        @if ($errors->has('amount'))
    <div class="alert alert-danger">
        {{ $errors->first('amount') }}
    </div>
@endif
        <form action="{{ route('bids.store', $product->id) }}" method="POST">
    @csrf

    <label for="amount">Dein Gebot:</label>

    <input
        type="number"
        name="amount"
        id="amount"
        step="0.01"
        min="0.01"
        required
    >

    <button type="submit" class="btn btn-dark">
        Gebot abgeben
    </button>
</form>
    </div>

</body>
</html>