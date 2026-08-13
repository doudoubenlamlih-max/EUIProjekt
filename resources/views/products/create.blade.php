<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Produkt erstellen</title>
</head>
<body>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <label for="title">Titel:</label>
<input type="text" id="title" name="title">

<br><br>

<label for="description">Beschreibung:</label>
<textarea id="description" name="description"></textarea>

<button type="submit">Speichern</button>
</form>
</body>
</html>