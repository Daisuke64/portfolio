<?php
    require 'connection.php';

    class PortAccessObject extends Datebase{

        public function login($useremail, $password){
            $sql = "SELECT * FROM users
                    WHERE user_email = '$useremail' AND user_password = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function adduser($user_fname, $user_lname, $user_address, $user_phone, $user_email, $user_password){
            $user_date = date('Y-m-d');
            $sql = "INSERT INTO users (user_fname, user_lname, user_address, user_phone, user_email, user_password, user_date) VALUES ('$user_fname', '$user_lname', '$user_address', '$user_phone', '$user_email', '$user_password', '$user_date')";
            $result = $this->conn->query($sql);
        }

        public function changeUserStatus($user_status, $user_id){
            $sql = "UPDATE users SET user_status = '$user_status'
            WHERE user_id = '$user_id'";
            $result = $this->conn->query($sql);
        }

        public function DeleteUser($user_id){
            $sql = "DELETE FROM users WHERE user_id = '$user_id'";
            $result = $this->conn->query($sql);
        }

        public function DeleteSong($song_id){
            $sql = "UPDATE songs SET song_status = 'I'
            WHERE song_id = '$song_id'";
            $result = $this->conn->query($sql);
        }

        public function DeleteAlbum($album_id){
            $sql = "UPDATE albums SET album_status = 'I'
            WHERE album_id = '$album_id'";
            $result = $this->conn->query($sql);
        }

        public function retrieveAllNewSong(){
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            WHERE song_date BETWEEN '$start_date' AND '$end_date' ORDER BY song_date DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllNewSong2(){
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            WHERE song_status = 'A'
            ORDER BY song_date DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllNewAlbum(){
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');
            $sql = "SELECT * FROM albums 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id 
            WHERE album_date BETWEEN '$start_date' AND '$end_date' ORDER BY album_date DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllNewAlbum2(){
            $sql = "SELECT * FROM albums 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id 
            WHERE album_status = 'A'
            ORDER BY album_date DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllSong(){
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            ORDER BY song_title ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllAlbum(){
            $sql = "SELECT * FROM albums 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id
            ORDER BY album_title ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllArtist(){
            $sql = "SELECT *  , GROUP_CONCAT(DISTINCT song_title ORDER BY song_date ASC  SEPARATOR '<br/>') AS song_titles, GROUP_CONCAT(album_title ORDER BY album_date ASC  SEPARATOR '<br/>') AS album_titles  FROM artists JOIN songs ON artists.artist_id = songs.artist_id JOIN albums ON albums.artist_id = artists.artist_id GROUP BY artist_name ORDER BY artist_name ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        
        public function retrieveAllSalesSong(){
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            WHERE sale_id != 99
            ORDER BY song_title ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllSalesAlbum(){
            $sql = "SELECT * FROM albums 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id
            WHERE sales.sale_id != 99
            ORDER BY album_title ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveRankingS(){
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            ORDER BY song_sold DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveRankingA(){
            $sql = "SELECT * FROM albums 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id
            ORDER BY album_sold DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
///////////////////////////////


        public function retrieveSearchSong($search){
            $sql = "SELECT * FROM songs
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            WHERE song_title LIKE '%$search%' OR song_label LIKE '%$search%' OR album_title LIKE '%$search%'
            OR album_contents LIKE '%$search%' OR album_label LIKE '%$search%' OR artist_name LIKE '%$search%' 
            OR artist_genre LIKE '%$search%' OR artist_country LIKE '%$search%'        
            ORDER BY song_date DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveSearchAlbum($search){
            $sql = "SELECT * FROM albums 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id
            WHERE album_title LIKE '%$search%' OR album_contents LIKE '%$search%' OR album_label LIKE '%$search%' 
            OR artist_name LIKE '%$search%' OR artist_genre LIKE '%$search%' OR artist_country LIKE '%$search%'     
            ORDER BY album_date DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

//////////////////////////////////////////////

        public function retrieveCartSong($song_id){
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            WHERE songs.song_id = '$song_id'
            ORDER BY song_title ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveCartAlbum($album_id){
            $sql = "SELECT * FROM albums 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id
            WHERE albums.album_id = '$album_id'
            ORDER BY album_title ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllUser($user_id){
            $sql = "SELECT * FROM users 
            WHERE user_id = '$user_id'";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllUserComplete(){
            $sql = "SELECT * FROM users";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAlluserA(){
            $sql = "SELECT * FROM users
            WHERE user_type = 'A'";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllUserU(){
            $sql = "SELECT * FROM users
            WHERE user_type = 'U'";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveSoldRankingS(){
            $sql = "SELECT song_title, album_title, 
            IF(sale_percentage != 0 , (song_sold * (song_price * sale_percentage)) , (song_sold * song_price)) AS rank
            FROM  songs
            JOIN artists ON songs.artist_id = artists.artist_id 
            LEFT JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            ORDER BY rank DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveSoldRankingA(){
            $sql = "SELECT album_title, 
            IF(sale_percentage != 0 , (album_sold * (album_price * sale_percentage)) , (album_sold * album_price)) AS rank
            FROM  albums
            JOIN artists ON albums.artist_id = artists.artist_id 
            JOIN sales ON albums.album_sale_id = sales.sale_id
            ORDER BY rank DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllsaleAdd(){
            $sql = "SELECT * FROM sales";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllArtistAdd(){
            $sql = "SELECT * FROM artists";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllAlbumsAdd(){
            $sql = "SELECT * FROM albums";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function addSong($song_image, $song_title, $song_date, $song_detail, $song_label, $song_price, $song_format, $song_stock, $song_sale_id, $song_album_id, $artist_id, $tmp_file_name, $directory){
            //this will get the file extension of the uploaded file
            $extension = pathinfo($song_image, PATHINFO_EXTENSION);
            //apple.png
            $array_extensions = array('png', 'jpg', 'jpeg', 'gif');
            if(in_array($extension, $array_extensions)){
            // this will check if the extension is in the list of accepted file extensions
                $new_directory = $directory.$song_image;
                if(move_uploaded_file($tmp_file_name, $new_directory)){
                    $new_directory = "images_songs/".$song_image;
                    $sql = "INSERT INTO songs (song_image, song_title, song_date, song_detail, song_label, song_price, song_format, song_stock, song_sale_id, song_album_id, artist_id) VALUES ('$new_directory', '$song_title', '$song_date', '$song_detail', '$song_label', '$song_price', '$song_format', '$song_stock', '$song_sale_id', '$song_album_id', '$artist_id')";
                    $result = $this->conn->query($sql);
                    return "Successfully Uploaded";
                }else{
                return $result = "Error in uploading the file";
                }

            }else{
            return $result = "Error! Unsupported file extension!";
            }
        }

        public function addAlbum($album_image, $album_title, $album_date, $album_detail, $album_label, $album_price, $album_format, $album_stock, $album_sale_id, $album_contents, $artist_id, $tmp_file_name, $directory){
            //this will get the file extension of the uploaded file
            $extension = pathinfo($album_image, PATHINFO_EXTENSION);
            //apple.png
            $array_extensions = array('png', 'jpg', 'jpeg', 'gif');
            if(in_array($extension, $array_extensions)){
            // this will check if the extension is in the list of accepted file extensions
                $new_directory = $directory.$album_image;
                if(move_uploaded_file($tmp_file_name, $new_directory)){
                    $new_directory = "images_albums/".$album_image;
                    $sql = "INSERT INTO albums (album_image, album_title, album_date, album_detail, album_label, album_price, album_format, album_stock, album_sale_id, album_contents, artist_id) VALUES ('$new_directory', '$album_title', '$album_date', '$album_detail', '$album_label', '$album_price', '$album_format', '$album_stock', '$album_sale_id', '$album_contents', '$artist_id')";
                    $result = $this->conn->query($sql);
                    return "Successfully Uploaded";
                }else{
                return $result = "Error in uploading the file";
                }

            }else{
            return $result = "Error! Unsupported file extension!";
            }
        }

        public function addArtist($artist_name, $artist_genre, $artist_country, $artist_detail){
            $sql = "INSERT INTO artists (artist_name, artist_genre, artist_country, artist_detail) VALUES ('$artist_name', '$artist_genre', '$artist_country', '$artist_detail')";
            $result = $this->conn->query($sql);
        }

        public function retrieveAllArtistAddPart($artist_id){
            $sql = "SELECT * FROM artists WHERE '$artist_id' = artist_id";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function changeSongQuantity($order_song_id, $order_quantity){
            $sql = "UPDATE songs SET song_sold = (song_sold + '$order_quantity'), song_stock = (song_stock - '$order_quantity')
            WHERE song_id = '$order_song_id'";
            $result = $this->conn->query($sql);
        }

        public function changeAlbumQuantity($order_album_id, $order_quantity2){
            $sql = "UPDATE albums SET album_sold = (album_sold + '$order_quantity2'), album_stock = (album_stock - '$order_quantity2')
            WHERE album_id = '$order_album_id'";
            $result = $this->conn->query($sql);
        }

        public function addOrder($order_quantity_s, $order_quantity_a, $list_s, $list_a, $order_user_id){
            $order_date = date('Y-m-d');
            $sql = "INSERT INTO orders (order_quantity_s, order_quantity_a, order_list_s, order_list_a, order_user_id, order_date) VALUES ('$order_quantity_s', '$order_quantity_a', '$list_s', '$list_a', '$order_user_id', '$order_date')";
            $result = $this->conn->query($sql);
        }

        public function retrieveAllOrder(){
            $sql = "SELECT * ,(order_quantity_s + order_quantity_a) AS total_quantity FROM orders
            JOIN users ON users.user_id = orders.order_user_id
            ORDER BY order_date DESC";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllOrder2($list_id){
            $sql = "SELECT * FROM orders WHERE order_id = '$list_id'";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllOrderSong($song_id){
            $sql = "SELECT * FROM songs WHERE song_id = $song_id";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveAllOrderAlbum($album_id){
            $sql = "SELECT * FROM albums WHERE album_id = $album_id";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        


               
    }