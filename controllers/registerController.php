<?php
class registerController extends controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $datas = array("warning" => '');

        if(isset($_POST['user']) && !empty($_POST['user'])){
            $user = addslashes($_POST['user']);
            $email = addslashes($_POST['email']);
            $password = md5($_POST['password']);

            //Check that all fields have been filled
            if(!empty($user)&& !empty($email)&& !empty($password)){
                $u = new users();
                
                //Verify that email already exist
                if(!$u->existUsers($email)) {
                    $_SESSION['snlg'] = $u->insertUsers($user, $email, $password);
                    header("Location: /social_network");
                }else{
                    $datas['warning'] = "Email already exists";}
            }else{
                $datas['warning'] = "Fill in all fields";}
        }
        $this->loadView('register', $datas);

    }      
}

  