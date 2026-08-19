@extends('layouts.app')

@section('title', $product->title)

@section('content')

<div class="container px-4 px-lg-5 py-5">

    {{-- Erfolgsmeldung --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Fehlermeldung --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="row gx-4 gx-lg-5 align-items-center">

        {{-- Produktbild --}}
        <div class="col-md-6">

            @if ($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->title }}"
                    class="img-fluid rounded"
                    style="width: 100%; height: 450px; object-fit: contain; background: white;"
                >

            @else

                <div
                    class="bg-light d-flex align-items-center justify-content-center rounded"
                    style="height: 450px;"
                >
                    <span class="text-muted fs-4">
                        Kein Bild vorhanden
                    </span>
                </div>

            @endif

        </div>


        {{-- Produktinformationen --}}
        <div class="col-md-6">

            <span class="badge bg-dark mb-3">
                Auktion
            </span>

            <h1 class="display-5 fw-bolder">
                {{ $product->title }}
            </h1>

            <p class="lead mt-3">
                {{ $product->description }}
            </p>


            {{-- Aktuelles Gebot --}}
            <div class="my-4">

                <small class="text-muted">
                    Aktuelles Gebot
                </small>

                <div class="fs-2 fw-bold text-primary">
                    {{ number_format($product->current_price, 2, ',', '.') }} €
                </div>

            </div>


            {{-- Fehler bei ungültigem Gebot --}}
            @if ($errors->has('amount'))
                <div class="alert alert-danger">
                    {{ $errors->first('amount') }}
                </div>
            @endif


            @if ($product->status !== 'sold')

                {{-- Gebot abgeben --}}
                <div class="card shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title mb-3">
                            Gebot abgeben
                        </h5>

                        <form
                            action="{{ route('bids.store', $product->id) }}"
                            method="POST"
                        >

                            @csrf

                            <div class="mb-3">

                                <label
                                    for="amount"
                                    class="form-label"
                                >
                                    Dein Gebot in €
                                </label>

                                <input
                                    type="number"
                                    name="amount"
                                    id="amount"
                                    class="form-control"
                                    step="0.01"
                                    min="0.01"
                                    placeholder="z.B. 50,00"
                                    required
                                >

                            </div>

                            <button
                                type="submit"
                                class="btn btn-dark w-100"
                            >
                                Gebot abgeben
                            </button>

                        </form>

                    </div>

                </div>


                {{-- Sofort kaufen --}}
                <form
                    action="{{ route('orders.store', $product->id) }}"
                    method="POST"
                    class="mt-3"
                >

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-success w-100"
                    >
                        Sofort kaufen –
                        {{ number_format($product->current_price, 2, ',', '.') }} €
                    </button>

                </form>

            @else

                <div class="alert alert-secondary">
                    Dieses Produkt wurde bereits verkauft.
                </div>

            @endif


            {{-- Produkt löschen --}}
            <form
                action="{{ route('products.destroy', $product->id) }}"
                method="POST"
                class="mt-3"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn btn-outline-danger w-100"
                    onclick="return confirm('Produkt wirklich löschen?')"
                >
                    Produkt löschen
                </button>

            </form>


            {{-- Zurück --}}
            <a
                href="{{ route('products.index') }}"
                class="btn btn-link mt-3"
            >
                ← Zurück zu den Produkten
            </a>

        </div>

    </div>

</div>

@endsection