<?php
session_start();
if (!isset($_SESSION['users']['email'])) {
    header("location:login");
}
class product extends DB{
    public function get_product(){

        $sql ="SELECT * FROM product";
        return mysqli_query($this->con,$sql);
        
    }
    public function insert_product(){
        if (!empty($_POST['add_prd']))
		{
			$name = $_POST['name'];
			$price = $_POST['price']; 
			$detail = $_POST['detail'];
            $cate_id = $_POST['category_id'];
			$anh = $_FILES["image"]['name'];
			if($anh != null)
				{ 
				$path = "./public/upload/";
				$tmp_name = $_FILES['image']['tmp_name'];
				$anh = $_FILES['image']['name'];

				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "insert into product(id, prd_name, price, prd_image, prd_detail, category_id) VALUES (NULL, '$name', '$price', '$anh', '$detail','$cate_id')";
					mysqli_query($this->con,$sql);
                    echo "Success";
				}
                header('Location: list_prd'); 
			}
	}
    public function delete(){
        if(!empty($_POST["delete"])){
            $id = $_POST["delete"];
            $sql =  "delete from product where id= $id";
            return mysqli_query($this->con,$sql);
            echo "Success";
            header("Location:list_prd");
        }
    }
    
    public function get_category(){
        $sql ="SELECT * FROM categories";
        $resultset = mysqli_query($this->con, $sql);

        $data = [];
        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            $data[] = $row;
        }
        return $data;
    } 
    public function get_prd_by_id(){
        if(!empty($_GET['url'])){
            $GET = (explode("/",$_GET['url']));
                            $id = (explode("=",$GET[2]));
                            $get_id=($id[1]);
                            $sql1 = "select * from product where id = $get_id";
            $result = mysqli_query($this->con, $sql1);
            $data1 = [];
            while (($row1 = mysqli_fetch_array($result, 1)) != null) {
            $data1[] = $row1;
            }
            return $data1;
        }
    }
    public function update(){

        if (!empty($_POST['update_prd']))
		    {
            $id_prd = $_POST['id']; 
			$name = $_POST['name'];
			$price = $_POST['price']; 
			$detail = $_POST['detail'];
            $cate_id = $_POST['category_id'];
			$anh = $_FILES["image"]['name'];
			if($anh != null)
				{ 
				$path = "./public/upload/";
				$tmp_name = $_FILES['image']['tmp_name'];
				$anh = $_FILES['image']['name'];

				move_uploaded_file($tmp_name,$path.$anh);
				}
                $sql = "UPDATE product SET prd_name = '$name', price = '$price', prd_image = '$anh', prd_detail = '$detail', category_id = '$cate_id' WHERE id=$id_prd";
				mysqli_query($this->con,$sql);
                header('Location: list_prd');    
			}
    }
    public function get_prd_in_cate(){
        if(!empty($_POST['view_prd']))
        {
            $id = $_POST['view_prd'];
            $sql ="SELECT prd_name, price, prd_image, category_id FROM product WHERE category_id = $id";
            return mysqli_query($this->con, $sql);
            
        }
        
    } 
        
}