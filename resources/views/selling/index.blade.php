@extends("layouts.app-master")

@section("title","List product")

@section('content')
    <div class="m-5"></div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <form action="{{route("cart.addToCart")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="ibox">
                            <div class="ibox-content product-box">
                                <div class="product-imitation">
                                    <img src="{{URL::to("imgs/products/$product->img_product")}}">
                                    <input type="hidden" class="input_img" name="id" value="{{$product->id}}"/>
                                    <input type="hidden" class="input_img" name="quantity" value="{{$product->quantity}}"/>
                                    <input type="hidden" class="input_img" name="img" value="{{$product->img_product}}"/>
                                </div>
                                <div class="product-desc">
                                        <input class="product-price transparent-input"
                                            value = "{{number_format($product->price)}} VND" name="price" readonly/>
                                    <small class="text-muted">Category</small>
                                    <input class="product-name" value="{{$product->title}}" readonly name="name"/>

                                    <input class="small m-t-xs" value=" {{$product->description}}" name="description">
                                    <div class="m-t text-righ">
                                        <a href="{{ route('product.details', $product) }}"
                                           class="btn btn-xs btn-outline btn-primary mt-3">Details
                                            <i class="fa fa-long-arrow-right"></i> </a>
                                        <button class="px-4 py-2 text-white btn-primary bg-blue-800 rounded mt-3">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section("script")
    <script>

    </script>
@endsection

@section("style")
    <style>
        body {
            outline: none;
            margin-top: 20px;
            background: #eee;
        }

        input{
            outline: none;
            border: none;
        }

        input.product-price{
            max-width: 150px;
        }

        /* E-commerce */
        .product-box {
            padding: 0;
            border: 1px solid #e7eaec;
        }

        .product-box:hover,
        .product-box.active {
            border: 1px solid transparent;
            -webkit-box-shadow: 0 3px 7px 0 #a8a8a8;
            -moz-box-shadow: 0 3px 7px 0 #a8a8a8;
            box-shadow: 0 3px 7px 0 #a8a8a8;
        }

        .product-imitation {
            text-align: center;
            padding: 90px 0;
            color: #bebec3;
            font-weight: 600;
        }

        .product-imitation img {
            max-width: 200px;
        }

        .cart-product-imitation {
            text-align: center;
            padding-top: 30px;
            height: 80px;
            width: 80px;
            background-color: white;
        }

        .product-imitation.xl {
            padding: 120px 0;
        }

        .product-desc {
            padding: 20px;
            position: relative;
        }

        .ecommerce .tag-list {
            padding: 0;
        }

        .ecommerce .fa-star {
            color: #d1dade;
        }

        .ecommerce .fa-star.active {
            color: #f8ac59;
        }

        .ecommerce .note-editor {
            border: 1px solid #e7eaec;
        }

        table.shoping-cart-table {
            margin-bottom: 0;
        }

        table.shoping-cart-table tr td {
            border: none;
            text-align: right;
        }

        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
            text-align: left;
        }

        table.shoping-cart-table tr td:last-child {
            width: 80px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 600;
            color: #676a6c;
            display: block;
            margin: 2px 0 5px 0;
        }

        .product-name:hover,
        .product-name:focus {
            color: #1ab394;
        }

        .product-price {
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            background-color: #1ab394;
            padding: 6px 12px;
            position: absolute;
            top: -32px;
            right: 0;
        }

        .product-detail .ibox-content {
            padding: 30px 30px 50px 30px;
        }

        .image-imitation {
            text-align: center;
            padding: 200px 0;
        }

        .product-main-price small {
            font-size: 10px;
        }

        .product-images {
            margin: 0 20px;
        }

        .ibox {
            clear: both;
            margin-bottom: 25px;
            margin-top: 0;
            padding: 0;
        }

        .ibox.collapsed .ibox-content {
            display: none;
        }

        .ibox.collapsed .fa.fa-chevron-up:before {
            content: "\f078";
        }

        .ibox.collapsed .fa.fa-chevron-down:before {
            content: "\f077";
        }

        .ibox:after,
        .ibox:before {
            display: table;
        }

        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px;
        }

        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }

        .ibox-footer {
            color: inherit;
            border-top: 1px solid #e7eaec;
            font-size: 90%;
            background: #ffffff;
            padding: 10px 15px;
        }
    </style>
@endsection
