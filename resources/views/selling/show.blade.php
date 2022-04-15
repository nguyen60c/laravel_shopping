@extends("layouts.app-master")

@section("title","Product details")

@section('content')
    <form action="{{ route('products.buy', $product->id) }}" method="POST">
        @csrf
        <div clas="container">
            {{-- Bugs --}}
            <div clas="col-sm">
                <img src="{{ asset("imgs/products/".$product->img_product) }}" class="product_img" alt=""
                     style="width: 200px;height: 200px">
            </div>
            {{-- end Bugs --}}
            <div class="row">
                <div class="col-sm mt-4">
                    <div>
                        <h3 class="product_title"></h3>
                    </div>
                    <div>
                        <h5> From:
                            <span class="product_description"></span>
                        </h5>
                    </div>
                    <div>
                        <h5>Price:<span class="product_price"></span></h5>
                    </div>
                    <h5>
                        Quantity:
                        <span class="product_quantity"></span>
                    </h5>
                    <h5>
                        <p class="text-danger"></p>
                        Amounts to buy:
                        <span class="product_amount">
                            <input type="number" name="amount" class="form-control transparent-input amount-input">
                        </span>
                    </h5>
                    <div>
                        Total:
                        <span class="product_total-price">
                            <input type="text" readonly class="form-control transparent-input total-price" value="0">
                        </span>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-info submit_buy">Buy</button>
                        <a href="{{ route('products.showProducts') }}" class="btn btn-info">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </form>



@endsection

@section("script")
    <script>
        $(document).ready(function () {

            /*
            process the string of url
             */
            var url = window.location.href;
            var url_array_slip = url.split("/");

            /*
            Get the value of product detail fields
             */
            var title = $(".product_title");
            var description = $(".product_description");
            var price = $(".product_price");
            var quantity = $(".product_quantity");
            var amount_input = $(".amount-input");
            var totalPrice = $(".product_total-price");
            var img_src = $(".product_img")

            /*
            Display specified product
            */
            var condition = parseInt(quantity.text()) - amount_input.val();
            $.ajax({
                url: "http://127.0.0.1:8000/api/product/" + url_array_slip[4],
                type: "GET",
                success: function (res) {
                    title.text(res.title);
                    description.text(res.description);
                    price.text(res.price);
                    quantity.text(res.quantity);
                    // amount_input.text(res.amount_input);
                    totalPrice.text(res.totalPrice);
                    var source = "{!! asset('imgs/products/" + res.img_product + "') !!}"
                    img_src.attr("src", source);
                    /*
           Check user input amount
            */
                    if (res.quantity <= 0) {
                        $(".text-danger").text("out of stock")
                        $(".submit_buy").attr("disabled", true);
                        $('.amount-input').attr('readonly', true);
                    }
                }
            });


            $('#inputId').attr('readonly', false);
            amount_input.keyup(function () {
                $.ajax({
                    url: "http://127.0.0.1:8000/api/product/" + url_array_slip[4],
                    type: "GET",
                    success: function (res) {

                        var condition = res.quantity - amount_input.val();
                        if (condition >= 0) {
                            console.log(res.price);
                            $(".text-danger").text("");
                            $(".submit_buy").attr("disabled", false);
                            $(".total-price").val(res.price * amount_input.val());
                        } else {
                            $(".text-danger").text("Bạn nhập vượt quá số lượng cho phép")
                            $(".submit_buy").attr("disabled", true);
                        }
                    }
                });
            });


            /*
            Submit form
            update amount products
             */
            $(".submit_buy").submit(function () {

                var data = {
                    "input": $(".amount-input")
                }

                $.ajaxSetup({
                    headers:
                        {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                    type: "POST",
                    url: "/http://127.0.0.1:8000/api/product/" + url_array_slip[4],
                    type: "GET",
                    data: data
                })
            })

        });
    </script>
@endsection



