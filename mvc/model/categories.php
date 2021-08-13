<?php
    session_start();
        if (!isset($_SESSION['users']['email'])) {
            header("location:login");
        }
    
    class categories extends DB{
        
        public function insert_cate(){
            if($_SESSION['users']['email']=="admin@gmail.com"){
                if (!empty($_POST)) {
                    $name   = $_POST['name'];
                    $slug   = $_POST['slug'];
                    if (!empty($name) && !empty($slug)){
                        $sql = "INSERT INTO categories(id, cate_name, slug) VALUES (NULL, '$name', '$slug')";
                        mysqli_query($this->con,$sql);
                        header('Location: list_categories'); 
                    } else {
                        $msg = "Please fill out the information!";
                    }
                }
            } else {
                header("location:list_categories");
            } 

        }
        public function get_category(){

            $sql ="SELECT * FROM categories";
            return mysqli_query($this->con,$sql);

        }

        public function delete_cate(){
            if($_SESSION['users']['email']=="admin@gmail.com"){
                if(!empty($_POST["delete"])){
                    $id = $_POST["delete"];
                    $sql =  "delete from categories where id= $id";
                    return mysqli_query($this->con,$sql);
                    echo "Success";
                }
            }else{
                header("location:list_categories");
            }
            
        }
        public function get_cate_by_id(){
            if(!empty($_GET['url'])){
                $GET = (explode("/",$_GET['url']));
	                            $id = (explode("=",$GET[2]));
	                            $get_id=($id[1]);
                                $sql = "select * from categories where id = $get_id";
                $result = mysqli_query($this->con, $sql);
                $data = [];
                while (($row = mysqli_fetch_array($result, 1)) != null) {
                $data[] = $row;
                }
                return $data;
            }
        }
        public function update_cate(){
            
            if($_SESSION['users']['email']=="admin@gmail.com"){
                if (!empty($_POST['update_cate']))
                {
                unset($_GET["url"]);
                $id_cate = $_POST['id']; 
                $name = $_POST['cate_name'];
                $slug = $_POST['slug']; 
                $sql = "UPDATE categories SET cate_name = '$name', slug = '$slug' WHERE id=$id_cate";
                    mysqli_query($this->con,$sql);
                    header('Location: /project/home/list_categories'); 
                }
                unset($_GET['url']);
            } else {
                header("location:list_categories");
            }
            
        }

    }
?>