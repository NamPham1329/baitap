<?php
session_start(); 
$GLOBALS['msg']="";
class user extends DB{
    public function register(){
        if (!empty($_POST)) {
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            $confirmPwd = $_POST['confirm_pwd'];

            if (!empty($email) && $password == $confirmPwd) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)){    
                    $password = md5($password);
                    $sql = "INSERT INTO users(id, email, password) VALUES (NULL, '$email', '$password')";
				    mysqli_query($this->con,$sql);
                } else {
                    $GLOBALS['msg']="Email is not a valid email address";
                }
            } else {
                $GLOBALS['msg']="Please fill in this form to create an account.";
            } 
        }
    }
    public function login(){
        $msg = '';
        if (!empty($_POST)) {
            $email    = $_POST['email'];
            $password = $_POST['password'];
        
            if (!empty($email) && !empty($password)) {
                $password = md5($password);
                $sql      = "SELECT * from users where email = '$email' and password = '$password'";
                $resultset = mysqli_query($this->con,$sql);
                $data = [];
                while (($row = mysqli_fetch_array($resultset, 1)) != null) {
                    $data[] = $row;
                }
                if (count($data) > 0) {
                    $_SESSION['users'] = $data[0];
                    header('Location: /baitap/home/list_prd');
                    die();
                }
            } else {
                echo "Login failed";
            }
        }
    }
    public function logout(){
        if(!empty($_POST['logout'])){
            unset($_SESSION['users']);
        }
    }
    
}
?>