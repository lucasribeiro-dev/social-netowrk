<?php
class loginController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $datas = array();
        
        $datas = array("warning" => '');

        //Login
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $password = md5($_POST['password']);

            $u = new users();

            if($u->login($email, $password)){
                header("Location: /social_network");
            }
        }
        $this->loadView('login', $datas);
    }
  
    public function logout(){
        //Logout of account
        unset($_SESSION['snlg']);
        header("Location: /social_network/login");
    }
}