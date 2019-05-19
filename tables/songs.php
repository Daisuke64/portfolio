<?php

$portdao = new PortAccessObject;
$songslist = $portdao->retrieveAllsong();

?>

<h4>Songs</h4>										
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
            <th>Quantity</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        $previousS = null;
        foreach($songslist as $key=>$value){
                echo "<form action='forms/cart.php?action=add&id=".$value['song_id']."' method='post'>";
                $az = $value['song_title'];
                echo "<tr>";
                if($previousS != $az[0]){
                    echo "<td id='".$az[0]."'>".$az[0]."</td>";
                    $previousS = $az[0];
                }else{
                    echo "<td></td>";
                }
                echo "<td><img src='".$value['song_image']."' alt='".$value['song_title']."' width='60' height='60'></td>";
                if(!empty($value['song_album_id'])){
                    echo "<td>".$value['song_title']."<br>(".$value['album_title'].")</td>";
                }else{
                    echo "<td>".$value['song_title']."</td>";
                }
                echo "<td>".$value['artist_name']."</td>";
                echo "<td>".$value['artist_genre']."</td>";
                echo "<td>".date('M d, Y', strtotime($value['song_date']))."</td>";
                if($value['song_sale_id'] != 99){
                    echo "<td>".(number_format($value['song_price'] * $value['sale_percentage'],2))." ←".$value['song_price']."<br><font color='red'>On Sale</font></td>";
                }else{
                    echo "<td>".$value['song_price']."</td>";
                }
                echo "<td>".$value['song_format']."</td>";
                echo "<td><a href='' role='button' class='btn'><i class='fas fa-angle-double-right'></i></a></td>";
                echo "<td><input type='number' value='0' min=0 max='".$value["song_stock"]."' name='quantity' style='width: 50px;'></td>";
                echo "<td><input type='submit' value='Cart' style='width: 80px;' class='btn btn-secondary'></td>";
                echo "</tr>";
                echo "</form>";
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