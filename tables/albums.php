<?php

$portdao = new PortAccessObject;
$albumslist = $portdao->retrieveAllAlbum();

?>

<h4>Albums</h4>										
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
            <th>quantity</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
        $previous = null;
        foreach($albumslist as $key=>$value){
                echo "<form action='forms/cart.php?action2=add&id=".$value['album_id']."' method='post'>";
                $az = $value['album_title'];
                echo "<tr>";
                if($previous != $az[0]){
                    echo "<td id='".$az[0]."'>".$az[0]."</td>";
                    $previous = $az[0];
                }else{
                    echo "<td></td>";
                }
                echo "<td><img src='".$value['album_image']."' alt='".$value['album_title']."' width='50' height='50'></td>";
                echo "<td>".$value['album_title']."</td>";
                echo "<td>".$value['artist_name']."</td>";
                echo "<td>".$value['artist_genre']."</td>";
                echo "<td>".date('M d, Y', strtotime($value['album_date']))."</td>";
                if($value['album_sale_id'] != 99){
                    echo "<td>".(number_format($value['album_price'] * $value['sale_percentage'],2))." ←".$value['album_price']."<br><font color='red'>On Sale</font></td>";
                }else{
                    echo "<td>".$value['album_price']."</td>";
                }
                echo "<td>".$value['album_format']."</td>";
                echo "<td><a href='' role='button' class='btn'><i class='fas fa-angle-double-right'></i></a></td>";
                echo "<td><input type='number' value='0' min=0 max='".$value["album_stock"]."' name='quantity' style='width: 50px;'></td>";
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