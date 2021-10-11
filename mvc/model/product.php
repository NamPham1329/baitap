<?php
require_once("categories.php");
class Product extends category
{
    public function get_product()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function addProduct($name, $price, $detail, $cate_ID, $prd_img)
    {
        $path = "../public/upload/";
        $tmp_name = $_FILES['image']['tmp_name'];
        $prd_img = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        move_uploaded_file($tmp_name, $path . $prd_img);
        if ($img_type !== "image/jpeg" || $img_type !== "image/png") {
            $prd_img = null;
        }
        $sql = "INSERT INTO product(id, product_name, price, product_detail, category_id, product_img) values(null,?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sdsss", $name, $price, $detail, $cate_ID, $prd_img);
        $stmt->execute();
        header('Location: /project/home/product');
    }
    function getById($id)
    {
        $sql = "SELECT * FROM product WHERE id=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    function updateProduct($id, $prd_name, $price, $prd_detail, $categoryID, $prd_img)
    {
        $path = "../../public/upload/";
        $tmp_name = $_FILES['image']['tmp_name'];
        $prd_img = $_FILES['image']['name'];
        move_uploaded_file($tmp_name, $path . $prd_img);
        $sql = "UPDATE product SET product_name = ?, price = ?, product_detail = ?, category_id = ?, product_img = ? WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sdssss", $prd_name, $price, $prd_detail, $categoryID, $prd_img, $id);
        $stmt->execute();
        header('Location: /project/home/product');
    }
    function delete($id)
    {
        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header('Location: /project/home/product');
    }
}


$product = new Product();
if (!empty($_POST['add_prd'])) {
    $prd_name = $_POST['name'];
    $price = $_POST['price'];
    $prd_detail = $_POST['detail'];
    $categoryID = $_POST['category_id'];
    $prd_img = $_FILES['image']['name'];
    $product->addProduct($prd_name, $price, $prd_detail, $categoryID, $prd_img);
}
if (!empty($_GET['id_product'])) {
    $id = $_GET['id_product'];
    $productID = $product->getById($id);
    $arr1 = [];
    foreach ($productID as $item) {
        $id = $item['id'];
        array_push($arr1, $id);
    }
    if (count($arr1) == 0) {
        header('Location:/project/home/NotFound');
    }
}
if (!empty($_POST['update_prd'])) {
    $id = $_POST['prdID'];
    $prd_name = $_POST['name'];
    $price = $_POST['price'];
    $prd_detail = $_POST['detail'];
    $categoryID = $_POST['category_id'];
    $prd_img = $_FILES['image']['name'];
    $product->updateProduct($id, $prd_name, $price, $prd_detail, $categoryID, $prd_img);
}
if (!empty($_POST['delete'])) {
    $id = $_POST['delete'];
    $product->delete($id);
} else {
    $allProduct = $product->get_product();
}
