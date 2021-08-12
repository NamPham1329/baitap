<!DOCTYPE html>
<html>
<head>
  <title>Update Category</title>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="../public/frontend/css/main.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;

}

* {
  box-sizing: border-box;
}

.container {
  width: 50%;
  margin: auto;
  padding: 16px;
  background-color: white;
  border: 5px solid green;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.slug{
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.slug:hover {
  opacity: 1;
}

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form method="POST" action = "/baitap/home/update_category">
  <div class="container">
    <h1>UPDATE CATEGORIES</h1>
    <hr>

    <label for="id"><b>Category ID:</b></label>
    <input type="text" name="id" value="<?php
            foreach ($data as $item){
                foreach ($item as $item1)
                echo $item1["id"];
            }
        ?>" readonly>

    <label for="name"><b>Category Name</b></label>
    <input type="text" placeholder="Enter Name" name="cate_name" value="<?php
        foreach ($data as $item){
          foreach ($item as $item1)
          echo $item1["cate_name"];
        }
    ?>">

    <label for="slug"><b>Slug</b></label>
    <input type="text" placeholder="Enter Slug" name="slug" value="<?php
        foreach ($data as $iqtem){
          foreach ($item as $item1)
          echo $item1["slug"];
        }
    ?>">
    <hr>
    <button type="submit" class="slug" name = "update_cate" value= "update">UPDATE</button>
    <div class="back" class='btn btn-warning left-margin'>
		  <a href="/baitap/home/list_categories">List Categories</a>
    </div>
  </div>
</form>

</body>
</html>