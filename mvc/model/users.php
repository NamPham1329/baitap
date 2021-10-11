<?php
require_once("role.php");
class User extends Role
{
    function getAll()
    {
        $sql = "SELECT * FROM account";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
    function getAccountByID($id)
    {
        $sql = "SELECT * FROM account WHERE id= ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    function update($roleID, $userID)
    {
        $sql = "UPDATE account SET role_id = ? WHERE id=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $roleID, $userID);
        $stmt->execute();
        header('Location: /project/home/user');
    }
    function delete($id)
    {
        $sql = "DELETE FROM account WHERE id =?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header('Location: /project/home/user');
    }
    function register($username, $password, $confirm_psw)
    {
        if ($password === $confirm_psw) {
            $pass = md5($password);
            $sql = "INSERT INTO account(id, username, password, role_id) values(null, ?, ?, '2')";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ss", $username, $pass);
            $stmt->execute();
        }
    }
    function login($username, $password)
    {
        $sql = "SELECT * FROM account WHERE username = ? and password = ? ";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $data = $stmt->get_result();
        foreach($data as $item)
        {
            if(!empty($item))
            {
                $_SESSION['users'] = $item;
                if($_SESSION['users']['role_id'] === 1)
                {
                    header('Location:/project/home/product');
                    die();
                }
                header('Location:/project/home/');
            }
        }
        if(!empty($this->data[0]))
            {
                $_SESSION['users'] = $this->data[0];
                if($_SESSION['users']['role_id'] === 1)
                {
                    header('Location: /project/home/product');
                    die();
                } 
                header('Location: /project/home');
            }
    }
    function logout()
    {
        session_destroy();
        header('Location: /project/home/');
    }
}
$account = new User();
if (!empty($_POST['logout'])) {
    return $account->logout();
}
if (!empty($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm_pwd'];
    $account->register($user, $pass, $confirm);
}
if (!empty($_POST['login'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $accountUser = $account->login($user, $pass);
}
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $idUser = $account->getAccountByID($id);
    $arr1 =[];
    foreach ($idUser as $item) {
        $id = $item['id'];
        array_push($arr1, $id);
    }
    if (count($arr1) == 0) {
        header('Location:/project/home/NotFound');
    }
}
if (!empty($_POST['updateUser'])) {
    $role = $_POST['role'];
    $id = $_POST['id'];
    $account->update($role, $id);
}
if (!empty($_POST['delete'])) {
    $id = $_POST['delete'];
    $account->delete($id);
} else {
    $listAccount = $account->getAll();
}
