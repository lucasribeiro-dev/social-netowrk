<?php
class homeController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new users();

        //Verify login
        if(!$u->isLogged()){
            header("Location: login");
            exit;
        } 
    }

    public function index() {
        $datas = array(
            'user'=>'',
        );

        //Write msg 
        $p = new posts();
    
        if(isset($_POST['msg']) && !empty($_POST['msg'])) {

            $msg = addslashes($_POST['msg']);
            $p->insertPost($msg);

        }

        $u = new users($_SESSION['snlg']);
        
        $datas['user'] = $u->getUser();
        //Count followers and people that user follow
        $datas['countFollowing'] = $u->countFollowing();
        $datas['countFollowers'] = $u->countFollowers();
        //Sugetion to follow
        $datas['sugestion'] = $u->getUsers(5);


        //Show feed only from people the user follows
        $list = $u->getFollowing();
        $list[] = $_SESSION['snlg'];
        $datas['feed'] = $p->getFeed($list, 10);

        //Load template home.php and send all information about the functions
        $this->loadTemplate('home', $datas);
    }

    //Function for follow 
    public function follow($id) {
        if(!empty($id)) {
            $id = addslashes($id);

            $sql = "SELECT * FROM users WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0) {

                $r = new relations();
                $r->follow($_SESSION['snlg'], $id);

            }
        }
        header("Location: /social_network");
    }

    //Function for unfollow 
    public function unfollow($id) {
        if(!empty($id)) {
            $id = addslashes($id);

            $sql = "SELECT * FROM users WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0) {

                $r = new relations();
                $r->unfollow($_SESSION['snlg'], $id);
            }
        }
        header("Location: /social_network");
    }
}