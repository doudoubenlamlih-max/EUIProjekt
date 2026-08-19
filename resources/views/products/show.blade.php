@extends('layouts.app')

@section('title', $product->title)

@section('content')

<div class="container px-4 px-lg-5 py-5">

    <div class="row gx-4 gx-lg-5 align-items-center">

        <!-- Produktbild -->
        <div class="col-md-6">

            <div class="bg-light d-flex align-items-center justify-content-center rounded"
                 style="height: 450px;">

                <span class="text-muted fs-4">
                    Produktbild
                </span>

            </div>

        </div>


        <!-- Produktinfos -->
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


            <div class="my-4">

                <small class="text-muted">
                    Aktuelles Gebot
                </small>

                <div class="fs-2 fw-bold text-primary">
                    {{ number_format($product->current_price, 2, ',', '.') }} €
                </div>

            </div>


            @if ($errors->has('amount'))

                <div class="alert alert-danger">
                    {{ $errors->first('amount') }}
                </div>

            @endif


            <div class="card shadow-sm">

                <div class="card-body">

                    <h5 class="card-title mb-3">
                        Gebot abgeben
                    </h5>

                    <form action="{{ route('bids.store', $product->id) }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label for="amount"
                                   class="form-label">

                                Dein Gebot in €

                            </label>

                            <input
                                type="number"
                                name="amount"
                                id="amount"
                                class="form-control"
                                step="0.01"
                                min="0.01"
                                placeholder="z.B. 250,00"
                                required
                            >

                        </div>

                        <button type="submit"
                                class="btn btn-dark w-100">

                            Gebot abgeben

                        </button>

                    </form>

                </div>

            </div>


            <a href="{{ route('products.index') }}"
               class="btn btn-link mt-3">

                ← Zurück zu den Produkten

            </a>

        </div>

    </div>

</div>

@endsection