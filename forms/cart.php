<?php

    session_start();
    require '../functions/portDAO.php';
    $portdao = new PortAccessObject;
    $song_id = null;
    if(isset($_GET['id'])){
        $song_id = $_GET['id'];
    }
    // $cartSongslist = $portdao->retrieveCartSong($song_id);
    // $cartAlbumslist = $portdao->retrieveCartSong($album_id);
    // print_r($cartSongslist);
    if(!empty($_GET["action"])){
        switch($_GET["action"]){
            case "add":
                if(!empty($_POST["quantity"])){
                    $cartSongslist = $portdao->retrieveCartSong($song_id);
                    $cartArray = array($cartSongslist[0]["song_id"]=>array("song_title"=>$cartSongslist[0]["song_title"],"song_id"=>$cartSongslist[0]["song_id"],"song_image"=>$cartSongslist[0]["song_image"],"quantity"=>$_POST["quantity"],"song_album_id"=>$cartSongslist[0]["song_album_id"],
                    "album_title"=>$cartSongslist[0]["album_title"],"artist_name"=>$cartSongslist[0]["artist_name"],"song_stock"=>$cartSongslist[0]["song_stock"],"song_format"=>$cartSongslist[0]["song_format"],"song_sale_id"=>$cartSongslist[0]["song_sale_id"],
                    "song_price"=>$cartSongslist[0]["song_price"],"sale_percentage"=>$cartSongslist[0]["sale_percentage"]));
                    if(!empty($_SESSION["cart_item"])){
                        if(in_array($cartSongslist[0]["song_id"],array_keys($_SESSION["cart_item"]))){
                            foreach($_SESSION["cart_item"] as $key => $value){
                                if($cartSongslist[0]["song_id"] == $key ){
                                    if(empty($_SESSION["cart_item"][$key]["quantity"])){
                                        $_SESSION["cart_item"][$key]["quantity"] = 1;
                                        
                                    }
                                    $_SESSION["cart_item"][$key]["quantity"] += $_POST["quantity"];
                                }
                            }
                        }else{
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$cartArray);
                        }
                    }else{
                        $_SESSION["cart_item"] = $cartArray;
                    }
                }
            break;
            case "remove":
                if(!empty($_SESSION["cart_item"])){
                    foreach($_SESSION["cart_item"] as $key => $value){
                        if($_GET["id"] == $value["song_id"])
                            unset($_SESSION["cart_item"][$key]);
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                    }
                }
            break;
            case "empty":
                unset($_SESSION["cart_item"]);
            break;
        }
    }


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
    #head {
        background: -webkit-linear-gradient(178deg, #97f0fe 0%, #324b66 100%);
        background: linear-gradient(178deg, #97f0fe 0%, #324b66 100%);
        padding: 20px 0px;
        text-align: center;
    }
    </style>
</head>

<body>
        <div class="jumbotron text-center" id="head">
                <h4>Shopping Cart</h4> 
                <p>Thank you for your purchase!</p> 
        </div>


        <div class="product-cart-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-cart-inner">
                            <div id="example-basic">
                                <h3>Shopping Cart</h3>
                                <section>
                                    <h3 class="product-cart-dn">Shopping</h3>
                                    <div class="product-list-cart">
                                        <div class="product-status-wrap border-pdt-ct">

                                            <table class="table table-striped table-bordered table-sm text-center" id="tables">
                                                <thead>
                                                    <tr class="table-success">
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Artist</th>
                                                        <th>Quantity</th>
                                                        <th>Format</th>
                                                        <th>Price</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
                                                    if(isset($_SESSION['cart_item'])){
                                                        foreach($_SESSION['cart_item'] as $key=>$value){
                                                                echo "<td><img src='../".$value['song_image']."' alt='".$value['song_title']."' width='50' height='50'></td>";
                                                                if(!empty($value['song_album_id'])){
                                                                    echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                                                                }else{
                                                                    echo "<td>".$value['song_title']."</td>";
                                                                }
                                                                echo "<td>".$value['artist_name']."</td>";
                                                                echo "<td><form action='cart.php' method='post'><input type='number' class='' name='quantity' min=0 max='".$value["song_stock"]."' value='".$value['quantity']."'></td>";
                                                                echo "<td>".$value['song_format']."</td>";
                                                                if($value['song_sale_id'] != 99){
                                                                    echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br>On Sale</td>";
                                                                }else{
                                                                    echo "<td>".$value['song_price']."</td>";
                                                                }
                                                                echo "<td><button type='submit' data-toggle='tooltip' title='Edit' class='pd-setting-ed'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></form></td>";
                                                                echo "<td><a href='cart.php?action=remove&id=".$value["song_id"]."' role='button' class='btn btn-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                                                                echo "</tr>";
                                                        }
                                                    }
                                                    ?>
                                                    </form>
                                                </tbody>    
                                            </table>

                                        </div>
                                    </div>
                                </section>
                                <h3>Delivery Details</h3>
                                <section>
                                    <h3 class="product-cart-dn">Shopping</h3>
                                    <div class="product-delivary">
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">First name *</label>
                                            <input id="name-2" name="name" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Last name *</label>
                                            <input id="surname-2" name="surname" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Select Country</label>
                                            <select class="form-control required">
													<option>Select Country</option>
													<option>Gujarat</option>
													<option>Kerala</option>
													<option>Manipur</option>
													<option>Tripura</option>
													<option>Sikkim</option>
												</select>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address *</label>
                                            <input id="address" name="address" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="form-label">City *</label>
                                            <input id="city" name="city" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone-2" class="form-label">Phone #</label>
                                            <input id="phone-2" name="phone" type="number" class="form-control phone">
                                        </div>
                                    </div>
                                </section>
                                <h3>Payment Details</h3>
                                <section>
                                    <h3 class="product-cart-dn">Shopping</h3>
                                    <div class="payment-details">
                                        <select id="hello-single" class="form-control">
												<option value="">---- Select card ----</option>
												<option value="married">Visa</option>
												<option value="unmarried">Master</option>
												<option value="married">American Express</option>
												<option value="unmarried">Discover</option>
											</select>
                                        <div class="form-group mg-t-15">
                                            <label for="card-number" class="form-label">Card number</label>
                                            <input id="card-number" class="form-control" type="text" name="card_number">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="expdate-month" class="form-label">Expiration date</label>
                                                <div class="row gutter-xs">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-group">
                                                            <select id="expdate-month" class="form-control" name="expdate_month">
																	<option value="" selected="selected">Month</option>
																	<option value="1">01</option>
																	<option value="2">02</option>
																	<option value="3">03</option>
																	<option value="4">04</option>
																	<option value="5">05</option>
																	<option value="6">06</option>
																	<option value="7">07</option>
																	<option value="8">08</option>
																	<option value="9">09</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																</select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <select id="expdate-year" class="form-control" name="expdate_year">
																	<option value="" selected="selected">Year</option>
																	<option value="2016">2016</option>
																	<option value="2017">2017</option>
																	<option value="2018">2018</option>
																	<option value="2019">2019</option>
																	<option value="2020">2020</option>
																	<option value="2021">2021</option>
																	<option value="2022">2022</option>
																	<option value="2023">2023</option>
																	<option value="2024">2024</option>
																	<option value="2025">2025</option>
																	<option value="2026">2026</option>
																	<option value="2027">2027</option>
																	<option value="2028">2028</option>
																	<option value="2029">2029</option>
																	<option value="2030">2030</option>
																	<option value="2031">2031</option>
																	<option value="2032">2032</option>
																	<option value="2033">2033</option>
																	<option value="2034">2034</option>
																	<option value="2035">2035</option>
																	<option value="2036">2036</option>
																</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 offset-md-1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="cvv2-number" class="form-label">Card Security Code</label>
                                                            <input id="cvv2-number" class="form-control" type="text" name="cvv2_number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="promotional-code" class="control-label">Promotional code</label>
                                            <input id="promotional-code" class="form-control" type="text" name="promotional_code">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </section>
                                <h3>Confirmation</h3>
                                <section>
                                    <div class="product-confarmation">
                                        <h2>Congratulations! Your Order is accepted.</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                            it to make a type specimen book.</p>
                                        <button class="btn btn-primary m-y">Track Order</button>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- wizard JS
		============================================ -->
    <script src="js/wizard/jquery.steps.js"></script>
    <script src="js/wizard/steps-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>