<?php

$portdao = new PortAccessObject;
$songlist = $portdao->retrieveAllsong();

?>

<h4>Songs</h4>										
<table class="table table-striped table-bordered table-sm text-center">
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
        $previous = null;
        foreach($songlist as $key=>$value){
                $az = $value['song_title'];
                echo "<tr>";
                if($previous != $az[0]){
                    echo "<td id='".$az[0]."'>".$az[0]."</td>";
                    $previous = $az[0];
                }else{
                    echo "<td></td>";
                }
                echo "<td><img src='".$value['song_image']."' alt='".$value['song_title']."' width='50' height='50'></td>";
                if(!empty($value['song_album_id'])){
                    echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                }else{
                    echo "<td>".$value['song_title']."</td>";
                }
                echo "<td>".$value['artist_name']."</td>";
                echo "<td>".$value['artist_genre']."</td>";
                echo "<td>".date('M d, Y', strtotime($value['song_date']))."</td>";
                if($value['song_sale_id'] != 99){
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
</table>

<ul class="pagination ">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item active"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>