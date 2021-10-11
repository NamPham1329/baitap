<?php
session_start();
class Role extends DB
{
    function getAll()
    {
        $sql = "SELECT * FROM role";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
    function getRolebyID($id)
    {
        $sql = "SELECT * FROM role WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    function add($name)
    {
        $sql = "INSERT INTO role(id, role_name) values(null, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        header('Location:  /project/home/role');
    }

    function update($id, $name)
    {
        $sql = "UPDATE role SET role_name = ? WHERE id=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $name, $id);
        $stmt->execute();
        $stmt->get_result();
        header('Location: /project/home/role');
    }
    function delete($id)
    {
        $sql = "DELETE FROM role WHERE id=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header('Location: /project/home/role');
    }
}
$role = new Role();
if (!empty($_POST['create'])) {
    $name = $_POST['name'];
    return $role->add($name);
}
if (!empty($_GET['id_role'])) {
    $id = $_GET['id_role'];
    $roleID = $role->getRolebyID($id);
    $arr1 =[];
    foreach ($roleID as $item) {
        $id = $item['id'];
        array_push($arr1, $id);
    }
    if (count($arr1) == 0) {
        header('Location:/project/home/NotFound');
    }
}
if (!empty($_POST['update'])) {
    $id = $_POST['roleID'];
    $name = $_POST['name'];
    return $role->update($id, $name);
}
if (!empty($_POST['delete'])) {
    $id = $_POST['delete'];
    return $role->delete($id);
} else {
    $listRole = $role->getAll();
}
