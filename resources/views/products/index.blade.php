@extends('layouts.app-master')
@section("title","Products")
@section('content')

    <div class="bg-light p-4 rounded">
        <h2>products</h2>
        <div class="lead">
            Manage your products here.
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Add product</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <tr>
                <th width="1%">No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantities</th>
                <th width="3%" colspan="3">Action</th>
            </tr>
            <?php $index = 1 ?>
            @foreach ($products as $key => $product)

                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ number_format($product->price) }}$</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $products->links() !!}
        </div>

    </div>
@endsection
