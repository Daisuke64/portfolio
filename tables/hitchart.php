<?php

$portdao = new PortAccessObject;
$rankSonglist = $portdao->retrieveRankingS();
$rankAlbumlist = $portdao->retrieveRankingA();

?>

<h4 id="headline2" class="pb-2"> Hit Chart</h4>

<table class="table table-striped table-bordered table-sm text-center" id="tables">
<h4 id="headline" class="text-center"> Songs</h4>
  <div class="p-2 bg-primary"><h4></h4></div>

    <thead>
        <tr class="table-success">
            <th>Rank</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Date</th>
            <th>Price</th>
            <th>Format</th>
            <th>Detail</th>
            <th>Quantity</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
        foreach($rankSonglist as $key=>$value){
            if($i >= 50){
                break;
            }
            echo "<form action='forms/cart.php?action=add&id=".$value['song_id']."' method='post'>";
            echo "<td>".$i."</td>";
            echo "<td><img src='".($value['song_image'])."' alt='".$value['song_title']."' width='50' height='50'></td>";
            if(!empty($value['song_album_id'])){
                echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
            }else{
                echo "<td>".$value['song_title']."</td>";
            }
            echo "<td>".$value['artist_name']."</td>";
            echo "<td>".$value['artist_genre']."</td>";
            echo "<td>".date('M d, Y', strtotime($value['song_date']))."</td>";
            if($value['sale_id'] != 99){
                echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br><font color='red'>On Sale</font></td>";
            }else{
                echo "<td>".$value['song_price']."</td>";
            }
            echo "<td>".$value['song_format']."</td>";
            echo "<td><button type='button' class='btn btn-primary' data-toggle='popover' title='Label:".$value['song_label']."' data-content='Explanation:".$value['song_detail']."'><i class='fas fa-angle-double-right'></i></button></td>";
            echo "<td><input type='number' value='0' min=0 max='".$value["song_stock"]."' name='quantity' style='width: 50px;'></td>";
            echo "<td><input type='submit' value='Cart' style='width: 80px;' class='btn btn-secondary'></td>";
            echo "</tr>";
            echo "</form>";
            $i++;

        }
        ?>
    </tbody>


    <table class="table table-striped table-bordered table-sm text-center">
    <h4 id="headline" class="text-center"> Albums</h4>
    <div class="p-2 bg-primary"><h4></h4></div>

    <thead>
        <tr class="table-success">
            <th>Rank</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Date</th>
            <th>Price</th>
            <th>Format</th>
            <th>Detail</th>
            <th>Quantity</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
        foreach($rankAlbumlist as $key=>$value){
            if($i >= 50){
                break;
            }
            echo "<form action='forms/cart.php?action2=add&id=".$value['album_id']."' method='post'>";
            echo "<td>".$i."</td>";
            echo "<td><img src='".($value['album_image'])."' alt='".$value['album_title']."' width='50' height='50'></td>";
            echo "<td>".$value['album_title']."</td>";
            echo "<td>".$value['artist_name']."</td>";
            echo "<td>".$value['artist_genre']."</td>";
            echo "<td>".date('M d, Y', strtotime($value['album_date']))."</td>";
            if($value['sale_id'] != 99){
                echo "<td>".(number_format($value['album_price'] * $value['sale_percentage'],2))." ←".$value['album_price']."<br><font color='red'>On Sale</font></td>";
            }else{
                echo "<td>".$value['album_price']."</td>";
            }
            echo "<td>".$value['album_format']."</td>";
            echo "<td><button type='button' class='btn btn-primary' data-toggle='popover' title='Label:".$value['album_label']."' data-content='".$value['album_contents']."'><i class='fas fa-angle-double-right'></i></button></td>";
            echo "<td><input type='number' value='0' min=0 max='".$value["album_stock"]."' name='quantity' style='width: 50px;'></td>";
            echo "<td><input type='submit' value='Cart' style='width: 80px;' class='btn btn-secondary'></td>";
            echo "</tr>";
            echo "</form>";
            $i++;
        }
        ?>
    </tbody>
     
</table>

<ul class="pagination ">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item active"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>

<script>
(function() {
  window.addEventListener("load", function () {
    $('[data-toggle="popover"]').popover();
  });
})();
</script>
