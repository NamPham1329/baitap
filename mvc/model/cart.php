<?php
require_once("product.php");
class Cart extends Product
{
    function getAll()
    {
        $sql = "SELECT * FROM cart";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
    function getCartByID($id)
    {
        $sql = "SELECT * FROM cart WHERE customer_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    function add($id)
    {
        $sql = "INSERT INTO cart(id, customer_id, order_status) values(null, ?, 'processing')";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
    function delete($id)
    {
        $sql = "DELETE FROM cart WHERE id='$id'";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header('Location: /project/home/cart');
    }
}
$cart = new Cart();
if (!empty($_POST["delete"])) {
    $id = $_POST["delete"];
    $cart->delete($id);
} else {
    $listCart = $cart->getAll();
}
