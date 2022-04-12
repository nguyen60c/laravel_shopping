@extends("layouts.app-master")

@section('content')
    @foreach ($products as $product)
        {{-- <form action="{{ route('products.buy', $product->id) }}" method="POST"> --}}
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
                {{ $product->img_product }}
                <img src="{{ asset('imgs//products//' . $product->img_product . '.png') }}" alt="">
            </div>
            {{-- end Bugs --}}

        </div>

        </div>
        <div class="mt-4">
            <a href="{{ route('product.details', $product) }}" class="btn btn-info">details</a>
        </div>

        {{-- </form> --}}
    @endforeach
@endsection
