<?php
class Checkout extends DB
{
    function check($id)
    {
        $sql = "UPDATE cart SET order_status = 'paid' WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
}
$checkout = new Checkout(); 
if (!empty($_POST['checkout'])) 
{
    $id = $_GET['id'];
    $checkout->check($id);
    header('Location:/project/home/');
}
