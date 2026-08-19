<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Produkt erstellen</title>
</head>
<body>

<h1>Produkt erstellen</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}">
    <br><br>

    <label for="description">Beschreibung:</label>
    <textarea id="description" name="description">{{ old('description') }}</textarea>
    <br><br>

    <label for="current_price">Startpreis:</label>
    <input
        type="number"
        id="current_price"
        name="current_price"
        step="0.01"
        min="0"
        value="{{ old('current_price') }}"
    >
    <br><br>

    <label for="category_id">Kategorie:</label>
    <select id="category_id" name="category_id">
        <option value="">Kategorie auswählen</option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Speichern</button>

</form>

</body>
</html>