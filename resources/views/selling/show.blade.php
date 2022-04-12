@extends("layouts.app-master")

@section('content')
    <form action="{{ route('products.buy', $product->id) }}" method="POST">
        @csrf
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
            <button type="submit" class="btn btn-info">Buy</button>
            <a href="{{ route('products.showProducts') }}" class="btn btn-info">Back</a>
        </div>

    </form>
@endsection
