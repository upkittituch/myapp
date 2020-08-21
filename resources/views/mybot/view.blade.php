

<!DOCTYPE html>
<html>
<head>
    <title>menu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Include SmartCart CSS -->
    <link href="{{asset('cart/css/smart_cart.min.css')}}" rel="stylesheet" type="text/css" />
    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
</head>
<body>
    <br />
    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Products
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            @foreach($data as $row)
                            <!-- BEGIN PRODUCTS -->

                            <div class="col-md-4 col-sm-6">
                                <div class="sc-product-item thumbnail">
                                <img data-name="product_image" src="{{$row->img}}" style="width:150px;height:150px;">
                                    <div class="caption">
                                        <h4 data-name="product_name">{{$row->name}}</h4>
                                        <p data-name="product_desc">Product details</p>
                                        <hr class="line">
                                        <div>
                                            <div class="form-group">
                                                <label>Size: </label>
                                                <select name="product_size" class="form-control input-sm">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                </select>
                                            </div>
                                            <div class="form-group2">
                                                <label>จำนวนสินค้า : </label>
                                                <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                                            </div><br>


                                            <strong class="price pull-left">{{$row->price}} บาท</strong>

                                            <input name="product_price" value={{$row->price}} type="hidden" />
                                            <input name="product_id" value={{$row->id}} type="hidden" />
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
                <form action="/menu" method="POST">
                    @csrf
                    <!-- SmartCart element -->
                    <div id="smartcart"></div>
                </form>

            </aside>
        </div>
    </section>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
    <!-- Include SmartCart -->
    <script src="{{asset('cart/js/jquery.smartCart.min.js')}}" type="text/javascript"></script>
    <!-- Initialize -->
    <script type="text/javascript">
        $(document).ready(function(){
            // Initialize Smart Cart
            $('#smartcart').smartCart();
		});
    </script>
    <script>
        function runApp() {
        liff.getProfile().then(profile => {
        document.getElementById("pictureUrl").src = profile.pictureUrl;
        document.getElementById("userId").innerHTML = '<b>UserId:</b> ' + profile.userId;
        document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
        document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
        document.getElementById("getDecodedIDToken").innerHTML = '<b>Email:</b> ' + liff.getDecodedIDToken().email;
      }).catch(err => console.error(err));
    }
        liff.init({ liffId: "1601968022-ogJrPZlm" }, () => {
          if (liff.isLoggedIn()) {

          } else {
            liff.login();
          }
        }, err => console.error(err.code, error.message));

      </script>

</body>
</html>

