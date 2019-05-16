<?php

$portdao = new PortAccessObject;
$newSonglist = $portdao->retrieveAllNewSong();
$newAlbumlist = $portdao->retrieveAllNewAlbum();

?>

<h4> New Releases</h4>

<table class="table table-striped table-bordered table-sm text-center">

  <div class="p-2 bg-primary"><h4></h4></div>

    <thead>
        <tr class="table-success">
            <th>A-Z</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Date</th>
            <th>Price</th>
            <th>Format</th>
            <th>Detail</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
        $previousS = null;
        foreach($newSonglist as $key=>$value){
            $az = $value['song_title'];
            echo "<tr>";
            if($previousS != $az[0]){
                echo "<td id='s_".$az[0]."'>".$az[0]."</td>";
                $previousS = $az[0];
            }else{
                echo "<td></td>";
            }
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
                echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br>On Sale</td>";
            }else{
                echo "<td>".$value['song_price']."</td>";
            }
            echo "<td>".$value['song_format']."</td>";
            echo "<td><a href='' role='button' class='btn'><i class='fas fa-angle-double-right'></i></a></td>";
            echo "<td><a href='' role='button' class='btn btn-info'><i class='fas fa-plus'></i></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>


    <table class="table table-striped table-bordered table-sm text-center" id="tables">

    <div class="p-2 bg-primary"><h4></h4></div>

    <thead>
        <tr class="table-success">
            <th>A-Z</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Date</th>
            <th>Price</th>
            <th>Format</th>
            <th>Detail</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
        $previousA = null;
        foreach($newAlbumlist as $key=>$value){
            $az = $value['album_title'];
            echo "<tr>";
            if($previousA != $az[0]){
                echo "<td id='a_".$az[0]."'>".$az[0]."</td>";
                $previousA = $az[0];
            }else{
                echo "<td></td>";
            }
            echo "<td><img src='".($value['album_image'])."' alt='".$value['album_title']."' width='50' height='50'></td>";
            echo "<td>".$value['album_title']."</td>";
            echo "<td>".$value['artist_name']."</td>";
            echo "<td>".$value['artist_genre']."</td>";
            echo "<td>".date('M d, Y', strtotime($value['album_date']))."</td>";
            if($value['sale_id'] != 99){
                echo "<td>".(number_format($value['album_price'] * $value['sale_percentage'],2))." ←".$value['album_price']."<br>On Sale</td>";
            }else{
                echo "<td>".$value['album_price']."</td>";
            }
            echo "<td>".$value['album_format']."</td>";
            echo "<td><a href='' role='button' class='btn'><i class='fas fa-angle-double-right'></i></a></td>";
            echo "<td><a href='' role='button' class='btn btn-info'><i class='fas fa-plus'></i></a></td>";
            echo "</tr>";
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
