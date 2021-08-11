<?php
session_start(); 
class user extends DB{
    public function register(){
        if (!empty($_POST)) {
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            $confirmPwd = $_POST['confirm_pwd'];

            if (!empty($email) && $password == $confirmPwd) {
                $password = md5($password);
                $sql = "INSERT INTO users(id, email, password) VALUES (NULL, '$email', '$password')";
				mysqli_query($this->con,$sql);
            } else {
                echo "Register failed";
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
            header('Location: /baitap/home/login');
        }
    }
    
}
?>