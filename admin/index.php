<?php
    session_start();
    if($_SESSION['logstat'] !="Active"){
        header('Location: logout.php');
		}

        require '../functions/portDAO.php';
        $portdao = new PortAccessObject;
        $userslist = $portdao->retrieveAllUser($_SESSION['id']);
        $userslistComp = $portdao->retrieveAllUserComplete();
        $userA = $portdao->retrieveAlluserA();
        $userU = $portdao->retrieveAlluserU();
        $rankS = $portdao->retrieveSoldRankingS();
        $rankA = $portdao->retrieveSoldRankingA();
        $newSonglist2 = $portdao->retrieveAllNewSong2();
        $newAlbumlist2 = $portdao->retrieveAllNewAlbum2();
        $orderlist = $portdao->retrieveAllOrder();


    if(isset($_POST['submit'])){
        if(!empty($_POST['check_id'])){
        $user_id = $_POST['check_id'];
        $user_status = $_POST['status'];
        $portdao->changeUserStatus($user_status, $user_id);
        header('refresh: 0');
        }
    }

    if(isset($_POST['delete'])){
        if(!empty($_POST['check_id'])){
        $user_id = $_POST['check_id'];
        $portdao->DeleteUser($user_id);
        header('refresh: 0');
        }
    }

    if(isset($_POST['delete_s'])){
        if(!empty($_POST['check_s'])){
        $song_id =$_POST['check_s'];
        $portdao->DeleteSong($song_id);
        header('refresh: 0');
        }
    }
    if(isset($_POST['delete_a'])){
        if(!empty($_POST['check_a'])){
        $album_id =$_POST['check_a'];
        $portdao->DeleteAlbum($album_id);
        header('refresh: 0');
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Admin</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->

        <!-- END HEADER MOBILE-->

        <!-- PAGE CONTAINER-->

            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $userslist[0]['user_fname'];?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $userslist[0]['user_fname'];?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $userslist[0]['user_email'];?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../index.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
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
                                                        echo "<td><a href='index.php?list_id=".$value['order_id']."' role='button' class='btn'><i class='fas fa-angle-double-right'></i></a></td>";

                                                    echo "</tr>";
                                                }
                                            ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive  text-white">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Name</th>
                                                        <th>Stock</th>
                                                    </tr>
                                                </thead>
                                                    <?php
                                                    if(isset($_GET["list_id"])){
                                                        $orderlist2 = $portdao->retrieveAllOrder2($_GET["list_id"]);
                                                        foreach($orderlist2 as $key=>$value){
                                                            echo "Total QuantitY (Songs)  : ".$value['order_quantity_s']."";
                                                            echo "<br>";
                                                            echo "Total Quantity (Albums) : ".$value['order_quantity_a']."";
                                                            if(!empty($value['order_list_s'])){
                                                                $orderlist11 = unserialize($value['order_list_s']);
                                                                foreach($orderlist11 as $key=>$value){
                                                                    $song_id = $value[0];
                                                                    $orderlist111 = $portdao->retrieveAllOrderSong($song_id);
                                                                    foreach($orderlist111 as $key=>$value){
                                                                        echo "<tr>";
                                                                        echo "<td>Song</td>";
                                                                        echo "<td>".$value['song_title']."</td>";
                                                                        echo "<td>".$value['song_stock']."</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                }
                                                            }
                                                            if(!empty($value['order_list_a'])){
                                                            $orderlist22 = unserialize($value['order_list_a']);
                                                                foreach($orderlist22 as $key=>$value){
                                                                    $album_id = $value[0];
                                                                    $orderlist222 = $portdao->retrieveAllOrderAlbum($album_id);
                                                                    foreach($orderlist222 as $key=>$value){
                                                                        echo "<tr>";
                                                                        echo "<td>".$value['album_id']."</td>";
                                                                        echo "<td>".$value['album_title']."</td>";
                                                                        echo "<td>".$value['album_stock']."</td>";
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
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                    <div class="filters m-b-45">
                                        <form action="" method="post">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="role">
                                                <option selected="selected">ROLE</option>
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">STATUS</option>
                                                <option value="">Active</option>
                                                <option value="">Inactive</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="pull-right">
                                        <button type="submitR" name="submitR" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="fas fa-refresh"></i></button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>name</td>
                                                    <td>role</td>
                                                    <td>Status</td>
                                                    <td colspan="2">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(isset($_POST['submitR'])){
                                                        if($_POST['role'] == "admin"){
                                                                foreach($userA as $key=>$value){
                                                                    echo "<form action='' method='post'>";
                                                                    echo "<tr>";
                                                                        echo "<td>";
                                                                            echo "<label class='au-checkbox'>";
                                                                                echo "<input type='checkbox' name='check_id' value='".$value['user_id']."'>";
                                                                                echo "<span class='au-checkmark'></span>";
                                                                            echo "</label>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            echo "<div class='table-data__info'>";
                                                                                echo "<h6>".$value['user_fname']." ".$value['user_lname']."</h6>";
                                                                                echo "<span>";
                                                                                echo "<a href='#'>".$value['user_email']."</a>";
                                                                                echo "<br>";
                                                                                echo "<a href='#'>".$value['user_phone']."</a>";
                                                                                echo "</span>";
                                                                            echo "</div>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            if($value['user_type'] == "A"){
                                                                                echo "<span class='role admin'>Admin</span>";
                                                                            }else{
                                                                                echo "<span class='role user'>User</span>";
                                                                            }
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            echo "<div class='rs-select2--trans rs-select2--sm'>";
                                                                                echo "<select class='js-select2' name='status'>";
                                                                                    if($value['user_status'] == 'A'){
                                                                                        echo "<option selected='selected' value='".$value['user_status']."'>Active</option>";
                                                                                        echo "<option value='I'>Inactive</option>";
                                                                                    }else{
                                                                                        echo "<option selected='selected' value='".$value['user_status']."'>Inactive</option>";
                                                                                        echo "<option value='A'>Active</option>";
                                                                                    }
                                                                                echo "</select>";
                                                                                echo "<div class='dropDownSelect2'></div>";
                                                                            echo "</div>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            echo "<span class='more'>";
                                                                                echo "<button type='submit' name='submit'><i class='fas fa-edit (alias)'></i></button>";
                                                                            echo "</span>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                        echo "<span class='more'>";
                                                                            echo"<button type='submit' name='delete'><i class='fas fa-times'></i></button>";
                                                                        echo "</span>";
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                    echo "</form>";
                                                                }
                                                        }elseif($_POST['role'] == "user"){
                                                                foreach($userU as $key=>$value){
                                                                    echo "<form action='' method='post'>";
                                                                    echo "<tr>";
                                                                        echo "<td>";
                                                                            echo "<label class='au-checkbox'>";
                                                                                echo "<input type='checkbox' name='check_id' value='".$value['user_id']."'>";
                                                                                echo "<span class='au-checkmark'></span>";
                                                                            echo "</label>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            echo "<div class='table-data__info'>";
                                                                                echo "<h6>".$value['user_fname']." ".$value['user_lname']."</h6>";
                                                                                echo "<span>";
                                                                                echo "<a href='#'>".$value['user_email']."</a>";
                                                                                echo "<br>";
                                                                                echo "<a href='#'>".$value['user_phone']."</a>";
                                                                                echo "</span>";
                                                                            echo "</div>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            if($value['user_type'] == "A"){
                                                                                echo "<span class='role admin'>Admin</span>";
                                                                            }else{
                                                                                echo "<span class='role user'>User</span>";
                                                                            }
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            echo "<div class='rs-select2--trans rs-select2--sm'>";
                                                                                echo "<select class='js-select2' name='status'>";
                                                                                    if($value['user_status'] == 'A'){
                                                                                        echo "<option selected='selected' value='".$value['user_status']."'>Active</option>";
                                                                                        echo "<option value='I'>Inactive</option>";
                                                                                    }else{
                                                                                        echo "<option selected='selected' value='".$value['user_status']."'>Inactive</option>";
                                                                                        echo "<option value='A'>Active</option>";
                                                                                    }
                                                                                echo "</select>";
                                                                                echo "<div class='dropDownSelect2'></div>";
                                                                            echo "</div>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                            echo "<span class='more'>";
                                                                                echo"<button type='submit' name='submit'><i class='fas fa-edit (alias)'></i></button>";
                                                                            echo "</span>";
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                        echo "<span class='more'>";
                                                                            echo"<button type='submit' name='delete'><i class='fas fa-times'></i></button>";
                                                                        echo "</span>";
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                    echo "</form>";
                                                                }    
                                                        }
                                                    }else{
                                                        foreach($userslistComp as $key=>$value){
                                                            echo "<form action='' method='post'>";
                                                            echo "<tr>";
                                                                echo "<td>";
                                                                    echo "<label class='au-checkbox'>";
                                                                        echo "<input type='checkbox' name='check_id' value='".$value['user_id']."'>";
                                                                        echo "<span class='au-checkmark'></span>";
                                                                    echo "</label>";
                                                                echo "</td>";
                                                                echo "<td>";
                                                                    echo "<div class='table-data__info'>";
                                                                        echo "<h6>".$value['user_fname']." ".$value['user_lname']."</h6>";
                                                                        echo "<span>";
                                                                        echo "<a href='#'>".$value['user_email']."</a>";
                                                                        echo "<br>";
                                                                        echo "<a href='#'>".$value['user_phone']."</a>";
                                                                        echo "</span>";
                                                                    echo "</div>";
                                                                echo "</td>";
                                                                echo "<td>";
                                                                    if($value['user_type'] == "A"){
                                                                        echo "<span class='role admin'>Admin</span>";
                                                                    }else{
                                                                        echo "<span class='role user'>User</span>";
                                                                    }
                                                                echo "</td>";
                                                                echo "<td>";
                                                                    echo "<div class='rs-select2--trans rs-select2--sm'>";
                                                                        echo "<select class='js-select2' name='status'>";
                                                                            if($value['user_status'] == 'A'){
                                                                                echo "<option selected='selected' value='".$value['user_status']."'>Active</option>";
                                                                                echo "<option value='I'>Inactive</option>";
                                                                            }else{
                                                                                echo "<option selected='selected' value='".$value['user_status']."'>Inactive</option>";
                                                                                echo "<option value='A'>Active</option>";
                                                                            }
                                                                        echo "</select>";
                                                                        echo "<div class='dropDownSelect2'></div>";
                                                                    echo "</div>";
                                                                echo "</td>";
                                                                echo "<td>";
                                                                    echo "<span class='more'>";
                                                                        echo"<button type='submit' name='submit'><i class='fas fa-edit (alias)'></i></button>";
                                                                    echo "</span>";
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo "<span class='more'>";
                                                                    echo"<button type='submit' name='delete'><i class='fas fa-times'></i></button>";
                                                                echo "</span>";
                                                            echo "</td>";
                                                            echo "</tr>";
                                                            echo "</form>";
                                                        }    
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>
                            <div class="col-lg-6">
                                <!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Top Sales</h3>
                                    <div class="filters m-b-45">
                                        <form action="" method="post">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">TYPE</option>
                                                <option value="songs">Songs</option>
                                                <option value="albums">Albums</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="pull-right">
                                        <button type="submitT" name="submitT" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="fas fa-refresh"></i></button>
                                        </div>
                                        </form>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                            <?PHP
                                                $i = 1;
                                                if(isset($_POST['submitT'])){
                                                    if($_POST['type'] == "songs"){
                                                        foreach($rankS as $key=>$value){
                                                            if($i >= 50){
                                                                break;
                                                            }
                                                            echo "<tr>";

                                                                echo "<td>".$i."</td>";
                                                                echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                                                                echo "<td>".number_format($value['rank'])."</td>";
    
                                                            echo "</tr>";
                                                            $i++;
                                                        }
                                                    }elseif($_POST['type'] == "albums"){
                                                        foreach($rankA as $key=>$value){
                                                            if($i >= 50){
                                                                break;
                                                            }
                                                            echo "<tr>";
                                                                
                                                                echo "<td>".$i."</td>";
                                                                echo "<td>".$value['album_title']."</td>";
                                                                echo "<td>".number_format($value['rank'])."</td>";

                                                            echo "</tr>";
                                                            $i++;
                                                        }
                                                    }    
                                                }else{
                                                    foreach($rankS as $key=>$value){
                                                        if($i >= 50){
                                                            break;
                                                        }
                                                        echo "<tr>";
                                                            
                                                            echo "<td>".$i."</td>";
                                                            echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                                                            echo "<td>".number_format($value['rank'])."</td>";

                                                        echo "</tr>";
                                                        $i++;

                                                    }
                                                }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <form action="" method="post">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="type2">
                                                <option selected="selected">Type</option>
                                                <option value="songs2">Songs</option>
                                                <option value="albums2">Album</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="pull-right">
                                        <button type="submitT2" name="submitT2" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="fas fa-refresh"></i></button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href='../forms/itemadd.php' role='botton' class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Add Item</a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                    <thead>
                                        <tr class="table-success">
                                            <th>Date</th>
                                            <th>Cover</th>
                                            <th>Title</th>
                                            <th>Artist</th>
                                            <th>Genre</th>
                                            <th>Price</th>
                                            <th>Format</th>
                                            <th>Stock</th>
                                            <th>Detail</th>
                                            <th colspan="2">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(isset($_POST['submitT2'])){
                                            if($_POST['type2'] == "songs2"){
                                                    foreach($newSonglist2 as $key=>$value){
                                                        echo "<form action='' method='post'>";
                                                        echo "<tr>";
                                                        echo "<td>".date('M d, Y', strtotime($value['song_date']))."</td>";
                                                        echo "<td><img src='../".($value['song_image'])."' alt='".$value['song_title']."' width='50' height='50'></td>";
                                                        if(!empty($value['song_album_id'])){
                                                            echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                                                        }else{
                                                            echo "<td>".$value['song_title']."</td>";
                                                        }
                                                        echo "<td>".$value['artist_name']."</td>";
                                                        echo "<td>".$value['artist_genre']."</td>";
                                                        if($value['sale_id'] != 99){
                                                            echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br><font color='red'>On Sale</font></td>";
                                                        }else{
                                                            echo "<td>".$value['song_price']."</td>";
                                                        }
                                                        echo "<td>".$value['song_format']."</td>";
                                                        echo "<td>".$value['song_stock']."</td>";
                                                        echo "<td><a href='' role='button' class=''><i class='fas fa-angle-double-right'></i></a></td>";
                                                        echo "<td>";
                                                        echo "<label class='au-checkbox'>";
                                                            echo "<input type='checkbox' name='check_s' value='".$value['song_id']."'>";
                                                            echo "<span class='au-checkmark'></span>";
                                                        echo "</label>";
                                                        echo "</td>";
                                                        echo "<td><button type='submit' name='delete_s' class='btn btn-danger'><i class='fas fa-times'></i></button></td>";
                                                        echo "</tr>";
                                                        echo "</form>";
                                                    }
                                            }elseif($_POST['type2'] == "albums2"){
                                                    foreach($newAlbumlist2 as $key=>$value){
                                                        echo "<form action='' method='post'>";
                                                        echo "<tr>";
                                                        echo "<td>".date('M d, Y', strtotime($value['album_date']))."</td>";
                                                        echo "<td><img src='../".($value['album_image'])."' alt='".$value['album_title']."' width='50' height='50'></td>";
                                                        echo "<td>".$value['album_title']."</td>";
                                                        echo "<td>".$value['artist_name']."</td>";
                                                        echo "<td>".$value['artist_genre']."</td>";
                                                        if($value['sale_id'] != 99){
                                                            echo "<td>".(number_format($value['album_price'] * $value['sale_percentage'],2))." ←".$value['album_price']."<br><font color='red'>On Sale</font></td>";
                                                        }else{
                                                            echo "<td>".$value['album_price']."</td>";
                                                        }
                                                        echo "<td>".$value['album_format']."</td>";
                                                        echo "<td>".$value['album_stock']."</td>";
                                                        echo "<td><a href='' role='button' class=''><i class='fas fa-angle-double-right'></i></a></td>";
                                                        echo "<td>";
                                                        echo "<label class='au-checkbox'>";
                                                            echo "<input type='checkbox' name='check_a' value='".$value['album_id']."'>";
                                                            echo "<span class='au-checkmark'></span>";
                                                        echo "</label>";
                                                        echo "</td>";
                                                        echo "<td><button type='submit' name='delete_a' class='btn btn-danger'><i class='fas fa-times'></i></button></td>";
                                                        echo "</tr>";
                                                        echo "</form>";
                                                    }
                                            }
                                        }else{
                                            foreach($newSonglist2 as $key=>$value){
                                                echo "<form action='' method='post'>";
                                                echo "<tr>";
                                                echo "<td>".date('M d, Y', strtotime($value['song_date']))."</td>";
                                                echo "<td><img src='../".($value['song_image'])."' alt='".$value['song_title']."' width='50' height='50'></td>";
                                                if(!empty($value['song_album_id'])){
                                                    echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                                                }else{
                                                    echo "<td>".$value['song_title']."</td>";
                                                }
                                                echo "<td>".$value['artist_name']."</td>";
                                                echo "<td>".$value['artist_genre']."</td>";
                                                if($value['sale_id'] != 99){
                                                    echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br><font color='red'>On Sale</font></td>";
                                                }else{
                                                    echo "<td>".$value['song_price']."</td>";
                                                }
                                                echo "<td>".$value['song_format']."</td>";
                                                echo "<td>".$value['song_stock']."</td>";
                                                echo "<td><a href='' role='button' class=''><i class='fas fa-angle-double-right'></i></a></td>";
                                                echo "<td>";
                                                echo "<label class='au-checkbox'>";
                                                    echo "<input type='checkbox' name='check_s' value='".$value['song_id']."'>";
                                                    echo "<span class='au-checkmark'></span>";
                                                echo "</label>";
                                                echo "</td>";
                                                echo "<td><button type='submit' name='delete_s' class='btn btn-danger'><i class='fas fa-times'></i></button></td>";
                                                echo "</tr>";
                                                echo "</form>";
                                            }
                                        }
                                    ?>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

                          
</body>

</html>
<!-- end document-->
