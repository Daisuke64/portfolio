<?php

$portdao = new PortAccessObject;
$artistslist = $portdao->retrieveAllArtist();

?>

<h4 id="headline2" class="pb-2"> Artists</h4>										
<table class="table table-striped table-bordered table-sm text-center" id="tables">

    <div class="p-2 bg-primary"><h4></h4></div>
    
    <thead>
        <tr class="table-success">
            <th>A-Z</th>
            <th>Artists</th>
            <th>Genre</th>
            <th>Country</th>
            <th>detail</th>
            <th>Songs</th>
            <th></th>
            <th>Albums</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
        $previousS = null;
        foreach($artistslist as $key=>$value){
                $az = $value['artist_name'];
                echo "<tr>";
                if($previousS != $az[0]){
                    echo "<td id='".$az[0]."'>".$az[0]."</td>";
                    $previousS = $az[0];
                }else{
                    echo "<td></td>";
                }
                echo "<td>".$value['artist_name']."</td>";
                echo "<td>".$value['artist_genre']."</td>";
                echo "<td>".$value['artist_country']."</td>";
                echo "<td><button type='button' class='btn btn-primary' data-toggle='popover' title='' data-content='Explanation:".$value['artist_detail']."'><i class='fas fa-angle-double-right'></i></button></td>";
                echo "<td>".$value['song_titles']."</td>";
                echo "<td><a href='' role='button' class='btn'><i class='fas fa-search'></i></a></td>";
                echo "<td>".$value['album_titles']."</td>";
                echo "<td><a href='' role='button' class='btn'><i class='fas fa-search'></i></a></td>";
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

<script>
(function() {
  window.addEventListener("load", function () {
    $('[data-toggle="popover"]').popover();
  });
})();
</script>