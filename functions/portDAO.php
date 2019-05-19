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

        public function retrieveAllNewSong(){
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            JOIN albums ON songs.song_album_id = albums.album_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            WHERE song_date BETWEEN '$start_date' AND '$end_date' ORDER BY song_date ASC";
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

        public function retrieveAllSong(){
            $sql = "SELECT * FROM songs 
            JOIN artists ON songs.artist_id = artists.artist_id 
            JOIN albums ON songs.song_album_id = albums.album_id
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
            JOIN albums ON songs.song_album_id = albums.album_id
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
            $sql = "SELECT * , SUM(order_quantity_s) AS total FROM orders
            JOIN songs ON songs.song_id = orders.order_song 
            JOIN albums ON songs.song_album_id = albums.album_id
            JOIN artists ON songs.artist_id = artists.artist_id
            JOIN sales ON songs.song_sale_id = sales.sale_id
            GROUP BY order_song
            ORDER BY total DESC";
            $result = $this->conn->query($sql);
            $rows = array();

            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveRankingA(){
            $sql = "SELECT * , SUM(order_quantity_a) AS total FROM orders
            JOIN albums ON albums.album_id = orders.order_album 
            JOIN artists ON albums.artist_id = artists.artist_id
            JOIN sales ON albums.album_sale_id = sales.sale_id
            GROUP BY order_album
            ORDER BY total DESC";
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
            JOIN albums ON songs.song_album_id = albums.album_id
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
            JOIN albums ON songs.song_album_id = albums.album_id
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
               
    }