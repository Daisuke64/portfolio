<?php
      require '../functions/portDAO.php';
      $portdao = new PortAccessObject;

      if(isset($_POST['add'])){

        $user_fname = $_POST['user_fname'];
        $user_lname = $_POST['user_lname'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $user_email = $_POST['user_email'];
        $user_password = md5($_POST['user_password']);
        $portdao->adduser($user_fname, $user_lname, $user_address, $user_phone, $user_email, $user_password);
        $massage = "Your Registration Is Complete!";
        header ('location: ../login.php?massage='.$massage);
      }

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Create New Account</title>
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
                <h4>Create New Account</h4> 
                <p>You're Welcom To Join Us</p> 
                <br>
        </div>

        <div class="container py-3 my-5">
          <form action="" method="post">
                                  
                  <div class="form-group">
                      <label for="user_fname" class="form-label">First name *</label>
                      <input id="user_fname" name="user_fname" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="user_lname" class="form-label">Last name *</label>
                      <input id="user_lname" name="user_lname" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="user_address" class="form-label">Address *</label>
                      <input id="user_address" name="user_address" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="user_phone" class="form-label">Phone *</label>
                      <input id="user_phone" name="user_phone" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="user_email" class="form-label">Email *</label>
                      <input id="user_email" name="user_email" type="text" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="user_password" class="form-label">Password *</label>
                      <input id="user_password" name="user_password" type="password" class="form-control phone">
                  </div>
                  <div class="text-center">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-primary" name="add">Submit</button>
                  </div>

                               
            </form>
        </div>

        <br>
        <br>


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