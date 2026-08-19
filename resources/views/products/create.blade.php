@extends('layouts.app')

@section('title', 'Produkt erstellen')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <h2 class="mb-4">
                        Produkt verkaufen
                    </h2>

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Titel
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control"
                                value="{{ old('title') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Beschreibung
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                class="form-control"
                                rows="4"
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="current_price" class="form-label">
                                Startpreis
                            </label>

                            <input
                                type="number"
                                id="current_price"
                                name="current_price"
                                class="form-control"
                                step="0.01"
                                min="0"
                                value="{{ old('current_price') }}"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label">
                                Kategorie
                            </label>

                            <select
                                id="category_id"
                                name="category_id"
                                class="form-select"
                            >

                                <option value="">
                                    Kategorie auswählen
                                </option>

                                @foreach ($categories as $category)

                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Produkt speichern
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="btn btn-outline-secondary">
                            Abbrechen
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection