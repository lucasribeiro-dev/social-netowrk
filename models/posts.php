<?php
class posts extends model {

	public function insertPost($msg) {

        //Insert post in db
		$user_id = $_SESSION['snlg'];

        $sql = "INSERT INTO posts SET user_id = '$user_id', post_data = NOW(), msg = '$msg'";
		$this->db->query($sql);

	}

	public function getFeed($list, $limit) {

        //Get feed in db
		$array = array();

		if(count($list) > 0) {

			$sql = "SELECT *, (select user from users where users.id = posts.user_id) as user FROM posts WHERE user_id IN (".implode(',', $list).") ORDER BY post_data DESC LIMIT ".$limit;
            $sql = $this->db->query($sql);

			if($sql->rowCount() > 0) {
				$array = $sql->fetchAll();
			}			

		}

		return $array;
	}

}