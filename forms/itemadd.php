<?php
      require '../functions/portDAO.php';
      $portdao = new PortAccessObject;
      $saleslist = $portdao->retrieveAllsaleAdd();
      $artistslist = $portdao->retrieveAllArtistAdd();

      if(isset($_POST['add'])){

        $song_image = $_POST['image'];
        $song_title = $_POST['title'];
        $song_date = $_POST['date'];
        $song_detail = $_POST['detail'];
        $song_label = $_POST['label'];
        $song_price = $_POST['price'];
        $song_format = $_POST['format'];
        $song_stock = $_POST['stock'];
        $song_price = $_POST['price'];
        $song_sale = $_POST['sale'];
        $song_album = $_POST['album'];
        $artist_name = null;
        if(!empty($_POST['artist_oldName'])){
          $artist_name = $_POST['artist_nameOld'];
        }else{
          $artist_name = $_POST['artist_nameNew']
        }
        $aritst_genre = $_POST['arrtist_genre'];
        $aritst_counrty = $_POST['arrtist_country'];
        $aritst_detail = $_POST['arrtist_detail'];
        $portdao->addsong($song_image, $song_title, $song_date, $song_detail, $song_label, $song_price, $song_format, $song_stock, $song_sale, $song_album, $artist_name, $aritst_genre, $aritst_counrty, $aritst_detail);
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

    <script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
</head>

<body>
        <div class="jumbotron text-center" id="head">
                <h4>Create New Item</h4> 
        </div>

        <div class="container py-3 my-5">
          <form action="" method="post">
                                  
                  <div class="form-group">
                      <label for="image" class="form-label">Song / Album Image</label>
                      <input id="image" name="image" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="title" class="form-label">Song / Album title</label>
                      <input id="title" name="title" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="date" class="form-label">Song / Album Date</label>
                      <input id="date" name="date" type="date" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="detail" class="form-label">Song / Album Detail</label>
                      <form>
                      <textarea name="detail" id="editor2" rows="10" cols="80">
                      </textarea>
                      <script>
                      // Replace the <textarea id="editor1"> with a CKEditor
                      // instance, using default configuration.
                      CKEDITOR.replace( 'editor2' );
                      </script>
                      </form>
                  </div>
                  <div class="form-group">
                      <label for="label" class="form-label">Song / Album Label</label>
                      <input id="labal" name="label" type="text" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="price" class="form-label">Song / Album Price</label>
                      <input id="price" name="price" type="number" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="format" class="form-label">Song / Album Format</label>
                      <input id="format" name="format" type="text" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="stock" class="form-label">Song / Album stock</label>
                      <input id="stock" name="stock" type="number" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="type" class="form-label">Sale Type</label>
                      <select name="sale" id="" class="form-control">
                          <option value="---">Please Choose Sale Type</option>
                          <?php
                              foreach($saleslist as $key => $values){
                                  echo "<option value='".$values['sale_id']."'>".$values['sale_name']."</option>";
                              }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="album" class="form-label">Album title (only Songs)</label>
                      <input id="album" name="album" type="text" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="contents" class="form-label">Album Contents (only Albums)</label>
                      <form>
                      <textarea name="contents" id="editor1" rows="10" cols="80">
                      </textarea>
                      <script>
                      // Replace the <textarea id="editor1"> with a CKEditor
                      // instance, using default configuration.
                      CKEDITOR.replace( 'editor1' );
                      </script>
                      </form>
                  <div class="form-group">
                      <label for="artist_nameOld" class="form-label">Artist Name</label>
                      <select name="artist_nameOld" id="" class="form-control">
                          <option value="">Please Choose An Artist</option>
                          <?php
                              foreach($artistslist as $key => $values){
                                  echo "<option value='".$values['artist_id']."'>".$values['artist_name']."</option>";
                              }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="artist_nameNew" class="form-label">Artist Name</label>
                      <input id="artist_nameNew" name="a_nameNew" type="text" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="artist_genre" class="form-label">Artist Genre</label>
                      <input id="artist_genre" name="a_genre" type="text" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="artist_country" class="form-label">Artist Country</label>
                      <input id="artist_country" name="a_country" type="text" class="form-control phone">
                  </div>
                  <div class="form-group">
                      <label for="artist_detail" class="form-label">Artist Detail</label>
                      <form>
                      <textarea name="artist_detail" id="editor3" rows="10" cols="80">
                      </textarea>
                      <script>
                      // Replace the <textarea id="editor1"> with a CKEditor
                      // instance, using default configuration.
                      CKEDITOR.replace( 'editor3' );
                      </script>
                      </form>
                  </div>
                  <div class="text-center">
                  <button type="submit" class="btn btn-primary pull-left" name="add_s">Submit For Songs</button>
                  <button type="submit" class="btn btn-primary pull-right" name="add_a">Submit For Albums</button>
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