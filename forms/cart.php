<?php

    session_start();
    if($_SESSION['logstat'] !="Active"){
        header('Location: ../logout.php');
    }
    require '../functions/portDAO.php';
    $portdao = new PortAccessObject;
    $song_id = null;
    $album_id = null;
    if(isset($_GET['id'])){
        $song_id = $_GET['id'];
        $album_id = $_GET['id'];
    }

    $userslist = $portdao->retrieveAllUser($_SESSION['id']);

    $cartSongslist = $portdao->retrieveCartSong($song_id);
    if(!empty($_GET["action"])){
        switch($_GET["action"]){
            case "add":
                if(!empty($_POST["quantity"])){

                    $cartArray = array($cartSongslist[0]["song_title"]=>array("song_title"=>$cartSongslist[0]["song_title"],"song_id"=>$cartSongslist[0]["song_id"],"song_image"=>$cartSongslist[0]["song_image"],"quantity"=>$_POST["quantity"],"song_album_id"=>$cartSongslist[0]["song_album_id"],
                    "album_title"=>$cartSongslist[0]["album_title"],"artist_name"=>$cartSongslist[0]["artist_name"],"song_stock"=>$cartSongslist[0]["song_stock"],"song_format"=>$cartSongslist[0]["song_format"],"song_sale_id"=>$cartSongslist[0]["song_sale_id"],
                    "song_price"=>$cartSongslist[0]["song_price"],"sale_percentage"=>$cartSongslist[0]["sale_percentage"], "artist_genre"=>$cartSongslist[0]["artist_genre"]));
                    if(!empty($_SESSION["cart_item"])){
                        if(in_array($cartSongslist[0]["song_title"],array_keys($_SESSION["cart_item"]))){
                            foreach($_SESSION["cart_item"] as $key => $value){
                                if($cartSongslist[0]["song_title"] == $key){
                                    if(empty($_SESSION["cart_item"][$key]["quantity"])){
                                        $_SESSION["cart_item"][$key]["quantity"] = 0;
                                        
                                    }
                                    $_SESSION["cart_item"][$key]["quantity"] += $_POST["quantity"];
                                }
                            }
                        }else{
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $cartArray);
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

    $cartAlbumslist = $portdao->retrieveCartAlbum($album_id);
    if(!empty($_GET["action2"])){
        switch($_GET["action2"]){
            case "add":
                if(!empty($_POST["quantity"])){

                    $cartArray2 = array($cartAlbumslist[0]["album_title"]=>array("album_title"=>$cartAlbumslist[0]["album_title"],"album_id"=>$cartAlbumslist[0]["album_id"],"album_image"=>$cartAlbumslist[0]["album_image"],"quantity"=>$_POST["quantity"],"album_id"=>$cartAlbumslist[0]["album_id"],
                    "artist_name"=>$cartAlbumslist[0]["artist_name"],"album_stock"=>$cartAlbumslist[0]["album_stock"],"album_format"=>$cartAlbumslist[0]["album_format"],"album_sale_id"=>$cartAlbumslist[0]["album_sale_id"],
                    "album_price"=>$cartAlbumslist[0]["album_price"],"sale_percentage"=>$cartAlbumslist[0]["sale_percentage"], "artist_genre"=>$cartAlbumslist[0]["artist_genre"]));
                    if(!empty($_SESSION["cart_item2"])){
                        if(in_array($cartAlbumslist[0]["album_title"],array_keys($_SESSION["cart_item2"]))){
                            foreach($_SESSION["cart_item2"] as $key => $value){
                                if($cartAlbumslist[0]["album_title"] == $key ){
                                    if(empty($_SESSION["cart_item2"][$key]["quantity"])){
                                        $_SESSION["cart_item2"][$key]["quantity"] = 0;
                                        
                                    }
                                    $_SESSION["cart_item2"][$key]["quantity"] += $_POST["quantity"];
                                }
                            }
                        }else{
                            $_SESSION["cart_item2"] = array_merge($_SESSION["cart_item2"],$cartArray2);
                        }
                    }else{
                        $_SESSION["cart_item2"] = $cartArray2;
                    }
                }
            break;
            case "remove":
                if(!empty($_SESSION["cart_item2"])){
                    foreach($_SESSION["cart_item2"] as $key => $value){
                        if($_GET["id"] == $value["album_id"])
                            unset($_SESSION["cart_item2"][$key]);
                        if(empty($_SESSION["cart_item2"]))
                            unset($_SESSION["cart_item2"]);
                    }
                }
            break;
            case "empty":
                unset($_SESSION["cart_item2"]);
            break;
        }
    }

    if(isset($_POST['order'])){
        $order_quantity_s = null;
        $order_quantity_a = null;
        $order_list_s = null;
        $order_list_a = null;
        $order_user_id = $_SESSION['id'];
            if(!empty($_SESSION["cart_item"])){
                $cart_item = $_SESSION["cart_item"];
                foreach($cart_item as $key => $value){
                    $order_song_id = $value['song_id'];
                    $order_quantity = $value['quantity'];
                    $portdao->changeSongQuantity($order_song_id, $order_quantity);
                    $order_quantity_s[] = $value['quantity'];
                    $order_list_s[] = $value['song_id'];
                    
                }
            }
            if(!empty($_SESSION["cart_item2"])){
                $cart_item2 = $_SESSION["cart_item2"];
                foreach($cart_item2 as $key => $value){
                    $order_album_id = $value['album_id'];
                    $order_quantity2 = $value['quantity'];
                    $portdao->changeAlbumQuantity($order_album_id, $order_quantity2);
                    $order_quantity_a[] = $value['quantity'];
                    $order_list_a[] = $value['album_id'];
                }

            }
        $list_s = serialize($order_list_s);
        $list_a = serialize($order_list_a);
        $quantity_s = serialize($order_quantity_s);
        $quantity_a = serialize($order_quantity_a);
        $portdao->addOrder($quantity_s, $quantity_a, $list_s, $list_a, $order_user_id);


        
    }
    if(isset($_POST['change'])){
        
        $user_fname = $_POST['user_fname'];
        $user_lname = $_POST['user_lname'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $user_email = $_POST['user_email'];
        $portdao->changeUser($user_fname, $user_lname, $user_address, $user_phone, $user_email, $_SESSION['id']);
        header('refresh: 0');

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
        <?php
        if(isset($_POST['order'])){
            echo "<div class='text-center'>";
            echo "<h2>Congratulations! Your Order is accepted.</h2>";
            echo "</div>";
            }
        ?>
        <div class="container text-center">
            <a href="../index.php#services-section" role="button" class="btn btn-info">←　Continue shopping</a>
            <a href="cart.php?action=empty&action2=empty" role="button" class="btn btn-danger">Empty your cart</a>
            
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
                                                        <th>Genre</th>
                                                        <th>Format</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
                                                    $total = 0;
                                                    if(isset($_SESSION['cart_item'])){
                                                        foreach($_SESSION['cart_item'] as $key=>$value){
                                                            echo "<td><img src='../".$value['song_image']."' alt='".$value['song_title']."' width='50' height='50'></td>";
                                                            if(!empty($value['song_album_id'])){
                                                                echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                                                            }else{
                                                                echo "<td>".$value['song_title']."</td>";
                                                            }
                                                            echo "<td>".$value['artist_name']."</td>";
                                                            echo "<td>".$value['artist_genre']."</td>";
                                                            echo "<td>".$value['song_format']."</td>";
                                                            if($value['song_sale_id'] != 99){
                                                                echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br>On Sale</td>";
                                                                $total += (number_format($value['song_price'] * $value['sale_percentage'],2));
                                                            }else{
                                                                echo "<td>".$value['song_price']."</td>";
                                                                $total += $value['song_price'];
                                                            }
                                                            echo "<td>".$value['quantity']."</td>";
                                                            echo "<td><a href='cart.php?action=remove&id=".$value["song_id"]."' role='button' class='btn btn-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                                                            echo "</tr>";
                                                        }
                                                    }

                                                    if(isset($_SESSION['cart_item2'])){
                                                        foreach($_SESSION['cart_item2'] as $key=>$value){
                                                            echo "<td><img src='../".$value['album_image']."' alt='".$value['album_title']."' width='50' height='50'></td>";
                                                            echo "<td>".$value['album_title']."</td>";
                                                            echo "<td>".$value['artist_name']."</td>";
                                                            echo "<td>".$value['artist_genre']."</td>";
                                                            echo "<td>".$value['album_format']."</td>";
                                                            if($value['album_sale_id'] != 99){
                                                                echo "<td>".(number_format($value['album_price'] * $value['sale_percentage'],2))." ←".$value['album_price']."<br>On Sale</td>";
                                                                $total += (number_format($value['album_price'] * $value['sale_percentage'],2));
                                                            }else{
                                                                echo "<td>".$value['album_price']."</td>";
                                                                $total += $value['album_price'];
                                                            }
                                                            echo "<td>".$value['quantity']."</td>";
                                                            echo "<td><a href='cart.php?action2=remove&id=".$value["album_id"]."' role='button' class='btn btn-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                                                            echo "</tr>";
                                                            
                                                        }
                                                    }

                                                    echo "<div class='pull-right'><h4>Total Price : ".$total."</h4></div>";
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
                                    <div class="product-delivary row">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="user_fname" class="form-label">First name *</label>
                                            <input id="user_fname" name="user_fname" value="<?php echo ($userslist[0]['user_fname']);?>" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_lname" class="form-label">Last name *</label>
                                            <input id="user_lname" name="user_lname" value="<?php echo ($userslist[0]['user_lname']);?>" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_address" class="form-label">Address *</label>
                                            <input id="user_address" name="user_address" value="<?php echo ($userslist[0]['user_address']);?>" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_phone" class="form-label">Phone *</label>
                                            <input id="user_phone" name="user_phone" value="<?php echo ($userslist[0]['user_phone']);?>" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_email" class="form-label">Email *</label>
                                            <input id="user_email" name="user_email" value="<?php echo ($userslist[0]['user_email']);?>" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="change" class="btn btn-success btn-block pull-right">Update</button>
                                        </div>
                                    </form>
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
                                        
                                    </div>
                                </section>
                                <h3>Confirmation</h3>
                                <section id="ordered">
                                    <div class="product-confarmation">
                                        <h2>Pease Check the information you have registered before pushing this botton!</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                            it to make a type specimen book.</p>
                                        <form action="" method="post"><button type="submit" name="order" class="btn btn-primary btn-block">Submit</button></form>
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