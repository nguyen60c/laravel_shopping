@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Show product</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Title: {{ $product->title }}
            </div>
            <div>
                Description: {{ $product->description }}
            </div>
            <div>
                Price: {{ $product->price }}
            </div>
            <div>
                Quantity: {{ $product->quantity }}
            </div>

            {{-- Bugs --}}
            <div>
                <img src="{{ asset('imgs/products/' . $product->img_product) }}" alt="">
            </div>
            {{-- end Bugs --}}

        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
