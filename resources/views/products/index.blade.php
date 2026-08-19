@extends('layouts.app')

@section('title', 'Produkte')

@section('content')

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">

            <h1 class="display-4 fw-bolder">
                MD Marktplatz & Bidding
            </h1>

            <p class="lead fw-normal text-white-50 mb-0">
                Kaufen, verkaufen und bieten
            </p>

        </div>
    </div>
</header>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">

            @foreach ($products as $product)

                <div class="col mb-5">

                    <div class="card h-100">

                        <div class="bg-light d-flex align-items-center justify-content-center"
                             style="height: 200px;">
                            Kein Bild
                        </div>

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