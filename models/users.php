<?php
class users extends model{

    private $uid;

	public function __construct($id = '') {
		parent::__construct();

        //Code for use $this->uid in query about sql
		if(!empty($id)) {
			$this->uid = $id;
		}
	}

    //Function for verify if session is set
    public function isLogged(){
        if(isset($_SESSION['snlg']) && !empty($_SESSION['snlg'])){
            return true;
        } else{
            return false;
        }
    }

    //Function for verify if exist the same email
    public function existUsers($email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
            return true;
        } else{
            return false;
        }
    }
    
    //Function for insert users in db
    public function insertUsers($user, $email, $password){
        $sql = "INSERT INTO users SET user = '$user', email = '$email', password = '$password'";
        $this->db->query($sql);

        $id = $this->db->lastInsertId();

        return $id;
    }


    //Function for do login in site
    public function login($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0 ){
            $sql = $sql->fetch();

            $_SESSION['snlg'] = $sql['id'];
            return true;
        } else{
            return false;
        }
    }

    //Function to get the name of the logged in user

    public function getUser(){
        if(!empty($this->uid)) {

			$sql = "SELECT user FROM users WHERE id = '".($this->uid)."'";
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0) {
				$sql = $sql->fetch();
				return $sql['user'];
			}			
		}
    }

    //Function for count folloing in profile
    public function countFollowing(){
        $sql = "SELECT * FROM relations WHERE following_id = '".($this->uid)."'";
        $sql = $this->db->query($sql);

		return $sql->rowCount();
    }

    //Function for count followers in profile
    public function countFollowers(){
        $sql = "SELECT * FROM relations WHERE followers_id = '".($this->uid)."'";
        $sql = $this->db->query($sql);

		return $sql->rowCount();

    }

    //Get user name and user id
    public function getUsers($limit){
        $array = array();

        $sql = "SELECT *,(select count(*) from relations where relations.following_id = '".($this->uid)."' AND relations.followers_id = users.id  ) as followers FROM users WHERE id != '".($this->uid)."' LIMIT $limit";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0 ){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    //Get datas about people's than user follow
    public function getFollowing() {
		$array = array();

        $sql = "SELECT * FROM relations WHERE following_id = '".($this->uid)."'";
        $sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			foreach($sql as $follow) {
				$array[] = $follow['following_id'];
			}
		}

		return $array;
	}
     
}