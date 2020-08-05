
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>mybot</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ csrf_field() }}
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Include SmartCart CSS -->
    <link href="{{asset('css/smart_cart.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    <br />
    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        สินค้า
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <!-- BEGIN PRODUCTS -->

                            @foreach($data as $row)
                            <div class="col-md-4 col-sm-6">
                                <div class="sc-product-item thumbnail">
                                    <img data-name="product_image" src="{{asset($row->img)}}" style="
                                    width: 150px;
                                    height: 150px;" alt="...">
                                    <div class="caption">
                                        <h4 data-name="product_name">{{$row->name}}</h4>
                                        <p data-name="product_desc">Product details</p>
                                        <hr class="line">

                                        <div>
                                            <div class="form-group">
                                                <label>Size: </label>
                                                <select name="product_size" class="form-control input-sm">
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                </select>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label>Color: </label><br />
                                                <label class="radio-inline">
                                                    <input type="radio" name="product_color" value="red"> red
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="product_color" value="blue"> blue
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="product_color" value="green"> green
                                                </label>
                                            </div> --}}
                                            <div class="form-group2">
                                                <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                                            </div>
                                            <strong class="price pull-left">{{$row->price}} บาท</strong>

                                            <input name="product_price" value="{{$row->price}}" type="hidden" />
                                            <input name="product_id" value="{{$row->id}}" type="hidden" />
                                            <button class="sc-add-to-cart btn btn-success btn-sm pull-right">สั่งซื้อ</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <aside class="col-md-4">

                <!-- Cart submit form -->
                <form action="{{asset('results.php')}}" method="POST">
                    <!-- SmartCart element -->
                    <div id="smartcart"></div>
                </form>

            </aside>
        </div>
    </section>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
    <!-- Include SmartCart -->
    <script src=" {{asset('js/jquery.smartCart.min.js')}}" type="text/javascript"></script>
    <!-- Initialize -->
    <script type="text/javascript">
        $(document).ready(function(){
            // Initialize Smart Cart
            $('#smartcart').smartCart();
		});
    </script>
</body>
</html>
