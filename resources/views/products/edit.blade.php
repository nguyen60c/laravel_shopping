@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update post</h2>
        <div class="lead">
            Edit post.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ $product->title }}" type="text" class="form-control" name="title"
                        placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ $product->description }}" type="text" class="form-control" name="description"
                        placeholder="Description" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="price" required
                        value="{{ $product->price }}" />

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" placeholder="quantity" required
                        value="{{ $product->quantity }}" />

                    @if ($errors->has('quantity'))
                        <span class="text-danger text-left">{{ $errors->first('quantity') }}</span>
                    @endif
                </div>

                @if ($msg = Session::get('success'))
                    <img src="images/products/{{ Session::get('img_product') }}" />
                @endif
                <div class="form-outline mb-3">
                    <img src="" alt="">
                    <input type="file" name="img_product" class="form-control" />
                </div>


                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
