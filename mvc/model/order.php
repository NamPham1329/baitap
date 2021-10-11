<?php
require_once("cart.php");
class Order extends Cart
{
    function getOrderByIdcart($id)
    {
        $sql = "SELECT * FROM orderdetail WHERE order_id=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    function addOrder($cart, $product, $price, $image, $quantity, $total)
    {
        $sql = "INSERT INTO orderdetail(id, order_id, order_total, product_name, product_img, product_price, quantity) values(null,?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ddssdd", $cart, $total, $product, $image, $price, $quantity);
        $stmt->execute();
    }
    function updateOrder($quantity, $idCart, $total)
    {
        $sql = "UPDATE orderdetail SET quantity = ?, order_total = ? WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ddd", $quantity, $total, $idCart);
        $stmt->execute();
    }
    function deleteOrder($id)
    {
        $sql = "DELETE FROM orderdetail WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
    function deleteAll($id)
    {
        $sql = "DELETE FROM orderdetail WHERE order_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
    function total($id)
    {
        $sql = "SELECT order_total FROM orderdetail WHERE order_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
}


$order = new Order();
if (!empty($_SESSION['users'])) {
    $idUser = $_SESSION['users']['id'];
    $idCart = $cart->getCartByID($idUser);
    foreach ($idCart as $item) {
        $id = $item['id'];
    }
    if (!empty($_POST['addToCart'])) {
        $idCart = $cart->getCartByID($idUser);
        foreach ($idCart as $value) {
            $id = $value['id'];
        }
        if (!isset($id)) {
            $cart->add($idUser);
            $idCart = $cart->getCartByID($idUser);
            foreach ($idCart as $value) {
                $id = $value['id'];
            }
        }
        $idProduct = $_POST['addToCart'];
        $productID = $product->getById($idProduct);

        foreach ($productID as $value) {
            $name = $value['product_name'];
            $image = $value['product_img'];
            $price = $value['price'];
            $quantity = '1';
            $total = $price * $quantity;
            $order->addOrder($id, $name, $price, $image, $quantity, $total);
        }
    }
    if (!empty($_POST['updateOrder'])) {
        $id_order = $_POST['updateOrder'];
        $order_list = $order->getOrderByIdcart($id_order);
        $arr = [];
        $pricePrd = [];
        foreach ($order_list as $value) {
            $price = $value['product_price'];
            array_push($pricePrd, $price);
            $order_id = $value['id'];
            array_push($arr, $order_id);
        }
        for ($i = 0; $i < count($arr); $i++) {
            $qty = $_POST['quantity'][$i];
            $id_order = $arr[$i];
            $total = $qty * $pricePrd[$i];
            $order->updateOrder($qty, $id_order, $total);
        }
    }
    
    if (!empty($_POST['deleteOrder'])) {
        $order->deleteOrder($_POST['deleteOrder']);
    }
    if (!empty($_POST['deleteAll'])) {
        $order->deleteAll($_POST['deleteAll']);
    }
    foreach($idCart as $value)
    {
        $id_cart=$value['id'];
        $subTotal = $order->total($id_cart);
        $sub_total = [];
        foreach($subTotal as $item)
        {
            $value = $item['order_total'];
            array_push($sub_total, $value);
        }
        $result = 0;
        for($i = 0; $i<count($sub_total); $i++)
        {
            $result += $sub_total[$i];
        }
    }
    //admin
    foreach ($idCart as $value) {
        $id = $value['id'];
        $orderList = $order->getOrderByIdcart($id);
    }
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $listOrder = $order->getOrderByIdcart($id);
        $arr1 = [];
        foreach ($listOrder as $item) {
            $id = $item['id'];
            array_push($arr1, $id);
        }
        if (count($arr1) == 0) {
            header('Location:/project/home/NotFound');
        }
    }
} else {
    header('Location: /project/home/login');
}
