<?php
session_start();
class category extends DB
{
    function getAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    function add($name)
    {
        $sql = "INSERT INTO categories(id, category_name) values(null, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        header('Location: /project/home/category');
    }
    function getByID($id)
    {
        $sql = "SELECT * FROM categories WHERE id=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    function update($id, $name)
    {
        $sql = "UPDATE categories SET category_name = ? WHERE id = ?";
        $stmt  = $this->con->prepare($sql);
        $stmt->bind_param('ss', $name, $id);
        $stmt->execute();
        header('Location: /project/home/category');
    }
    function delete($id)
    {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header('Location: /project/home/category');
    }
}
$category = new category();

if (!empty($_POST['create'])) {
    $name = $_POST['name'];
    $category->add($name);
}
if (!empty($_GET['id_category'])) {
    $id = $_GET['id_category'];
    $categoryID = $category->getByID($id);
    $arr1 =[];
    foreach ($categoryID as $item) {
        $id = $item['id'];
        array_push($arr1, $id);
    }
    if (count($arr1) == 0) {
        header('Location:/project/home/NotFound');
    }
}
if (!empty($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category->update($id, $name);
}
if (!empty($_POST["delete"])) {
    $id = $_POST["delete"];
    $category->delete($id);
} else {
    $listCategories = $category->getAll();
}
