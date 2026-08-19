@extends('layouts.app')

@section('title', 'Produkte')

@section('content')

<section class="py-5">
    <div class="container px-4 px-lg-5">

        <!-- Suche + Kategorie + Sortierung -->
        <form method="GET"
              action="{{ route('products.index') }}"
              class="row g-2 mb-5">

            <!-- Produktsuche -->
            <div class="col-md-4">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Produkt suchen..."
                    value="{{ request('search') }}"
                >

            </div>


            <!-- Kategorie -->
            <div class="col-md-3">

                <select name="category"
                        class="form-select">

                    <option value="">
                        Alle Kategorien
                    </option>

                    @foreach ($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Sortierung -->
            <div class="col-md-3">

                <select name="sort"
                        class="form-select">

                    <option value="">
                        Sortierung
                    </option>

                    <option value="price_asc"
                        {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                        Preis aufsteigend
                    </option>

                    <option value="price_desc"
                        {{ request('sort') === 'price_desc' ? 'selected' : '' }}>
                        Preis absteigend
                    </option>

                </select>

            </div>


            <!-- Filter Button -->
            <div class="col-md-2">

                <button type="submit"
                        class="btn btn-dark w-100">

                    Filtern

                </button>

            </div>

        </form>


        <!-- Produkte -->
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">

            @forelse ($products as $product)

                <div class="col mb-5">

                    <div class="card h-100">

                        <!-- Produktbild -->
                        @if ($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                class="card-img-top"
                                alt="{{ $product->title }}"
                                style="height: 200px; object-fit: cover;"
                            >

                        @else

                            <div class="bg-light d-flex align-items-center justify-content-center"
                                 style="height: 200px;">

                                Kein Bild vorhanden

                            </div>

                        @endif


                        <!-- Produktinformationen -->
                        <div class="card-body p-4">

                            <div class="text-center">

                                <h5 class="fw-bolder">
                                    {{ $product->title }}
                                </h5>

                                <p>
                                    {{ $product->description }}
                                </p>

                                <!-- Kategorie -->
                                @if ($product->category)

                                    <small class="text-muted d-block mb-2">
                                        {{ $product->category->name }}
                                    </small>

                                @endif

                                <!-- Preis -->
                                <strong>
                                    {{ number_format($product->current_price, 2, ',', '.') }} €
                                </strong>


                                <!-- Detailseite -->
                                <div class="mt-3">

                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="btn btn-outline-dark">

                                        Jetzt bieten

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-secondary text-center">
                        Keine Produkte gefunden.
                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection