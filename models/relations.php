<?php
class relations extends model{

    public function follow($following, $followers){
        //Insert follow in db
        $sql = "INSERT INTO relations SET following_id = '$following', followers_id = '$followers' ";
        $this->db->query($sql);

    }

    public function unfollow($following, $followers){
        //Delete follow in db
        $sql = "DELETE FROM relations WHERE following_id = '$following' AND followers_id = '$followers' ";
        $this->db->query($sql);


    }
}
