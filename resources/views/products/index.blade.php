@extends('layouts.app')

@section('title', 'Produkte')

@section('content')

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">

            @foreach ($products as $product)

                <div class="col mb-5">

                    <div class="card h-100">
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

                        <div class="card-body p-4">
                            <div class="text-center">

                                <h5 class="fw-bolder">
                                    {{ $product->title }}
                                </h5>

                                <p>
                                    {{ $product->description }}
                                </p>

                                <strong>
                                    {{ $product->current_price }} €
                                </strong>

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

            @endforeach

        </div>
    </div>
</section>

@endsection