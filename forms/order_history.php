<?php
    session_start();
    if($_SESSION['logstat'] !="Active"){
        header('Location: ../logout.php');
		}

        require '../functions/portDAO.php';
        $portdao = new PortAccessObject;
        $userslist = $portdao->retrieveAllUser($_SESSION['id']);
        $userslistComp = $portdao->retrieveAllUserComplete();
        $orderlist = $portdao->retrieveAllOrderPart($_SESSION['id']);

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Your Order History</title>
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
                <h4>Your Order History</h4> 
                <p>Check Your Order!</p> 
                <br>
        </div>

        <div class="container text-center">
            <a href="../index.php#services-section" role="button" class="btn btn-info">←　Back To Main Page</a>
        </div>

        <br>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive table--no-card  bg-success m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>Date</th>
                                                <th>Order ID</th>
                                                <th>User</th>
                                                <th>Order Status</th>
                                                <th>Order List</th>
                                            </tr>
                                        </thead>
                                             <?php
                                                foreach($orderlist as $key=>$value){
                                                    echo "<tr>";

                                                        echo "<td>".$value['order_date']."</td>";
                                                        echo "<td>".$value['order_id']."</td>";
                                                        echo "<td>".$value['user_fname']." ".$value['user_lname']."</td>";
                                                        echo "<td>".$value['order_status']."</td>";
                                                        echo "<td><a href='order_history.php?list_id=".$value['order_id']."' role='button' class='btn'><i class='fas fa-list'></i></a></td>";

                                                    echo "</tr>";
                                                }
                                            ?>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="table-responsive table--no-card  bg-success m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Name</th>
                                                        <th>Format</th>
                                                        <th>Price</th>
                                                        <th>Ordered Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $total = 0;
                                                    if(isset($_GET["list_id"])){
                                                        $orderQuantityS = null;
                                                        $orderQuantityA = null;
                                                        $orderlist2 = $portdao->retrieveAllOrder2($_GET["list_id"]);
                                                        foreach($orderlist2 as $key=>$value){
                                                            if(!empty($value['order_list_s'])){
                                                                $orderlist11 = unserialize($value['order_list_s']);
                                                                $orderS = unserialize($value['order_quantity_s']);
                                                                foreach($orderS as $key=>$value){
                                                                    $orderQuantityS = $value[0];
                                                                    }
                                                                foreach($orderlist11 as $key=>$value){
                                                                    $song_id = $value[0];
                                                                    $orderlist111 = $portdao->retrieveAllOrderSong($song_id);
                                                                    foreach($orderlist111 as $key=>$value){
                                                                        echo "<tr>";
                                                                        echo "<td>Song</td>";
                                                                        echo "<td>".$value['song_title']."</td>";
                                                                        echo "<td>".$value['song_format']."</td>";
                                                                        if($value['song_sale_id'] != 99){
                                                                          echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br>On Sale</td>";
                                                                          $total += (number_format($value['song_price'] * $value['sale_percentage'],2));
                                                                        }else{
                                                                            echo "<td>".$value['song_price']."</td>";
                                                                            $total += $value['song_price'];
                                                                        }
                                                                        echo "<td>".$orderQuantityS."</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        foreach($orderlist2 as $key=>$value){
                                                            if(!empty($value['order_list_a'])){
                                                                $orderlist22 = unserialize($value['order_list_a']);
                                                                $orderA = unserialize($value['order_quantity_a']);
                                                                foreach($orderA as $key=>$value){
                                                                    $orderQuantityA = $value[0];
                                                                    }
                                                                foreach($orderlist22 as $key=>$value){
                                                                    $album_id = $value[0];
                                                                    $orderlist222 = $portdao->retrieveAllOrderAlbum($album_id);
                                                                    foreach($orderlist222 as $key=>$value){
                                                                        echo "<tr>";
                                                                        echo "<td>Album</td>";
                                                                        echo "<td>".$value['album_title']."</td>";
                                                                        echo "<td>".$value['album_format']."</td>";
                                                                        if($value['album_sale_id'] != 99){
                                                                          echo "<td>".(number_format($value['album_price'] * $value['sale_percentage'],2))." ←".$value['album_price']."<br>On Sale</td>";
                                                                          $total += (number_format($value['album_price'] * $value['sale_percentage'],2));
                                                                        }else{
                                                                            echo "<td>".$value['album_price']."</td>";
                                                                            $total += $value['album_price'];
                                                                        }
                                                                        echo "<td>".$orderQuantityA."</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    ?>
                                                </tbody>
                                      </table>
                                      
                                </div>
                                <?php echo "<div class='pull-right'><h4>Total Price : ".$total."</h4></div>"; ?>
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