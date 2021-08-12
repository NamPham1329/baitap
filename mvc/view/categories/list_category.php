<!DOCTYPE html>
<html>
<head>
	<title>Danh sách</title>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="../public/frontend/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.form{
			display: flex;
		}
		button{
			margin-right: 5px;
			margin-left: 5px;
		}
		.table td, .table th{
			border-top: 0px;
		}
        .table{
            width: 60%;
            margin: auto;
            border: 1px solid;
        }
		.product{
			text-align: center;
		}
		.btn{
			margin-top: 5px;
		}
		.table{
			margin-top: 5%;
		}
		.header button{
			margin-left: 80%;
		}
		.btn-warning {
			color: #000;
			background-color: #f0ad4e;
			border-color: #eea236;
		}
		.back{
			text-align: center;
		}
	</style>
</head> 
<body>
<div class="header">
	<div class="navigation">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="product">
						<a class="nav-link" href="/baitap/home/list_prd">PRODUCT</a>
					</li>
					<li class="category">
						<a class="nav-link" href="/baitap/home/list_categories">CATEGORY</a>
					</li>
				</ul>
				<form method="POST" action="/baitap/home/logout">
						<button class='btn btn-warning left-margin' type="submit" name="update" value="<?php echo $_SESSION['users']['email']?>">Logout</button>	
				</form>
			</div>
		</nav>
	</div>
</div>
<table class="table">
  <thead>
    <tr>
		<th scope="col">CATEGORY ID</th>
      	<th scope="col">CATEGORY NAME</th> 
        <th scope="col">SLUG</th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  		while ($row = mysqli_fetch_array($data["type"])) {?>
  		 	<tr>
				<td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["cate_name"]; ?></td>
                <td><?php echo $row["slug"]; ?></td>
				<td class = "form">
					<form method="GET">
						<a href='/baitap/home/get_category_by_id/id=<?php echo $row["id"]?>' class='btn btn-warning left-margin'>
							Edit 	
						</a>
					</form>
					<form method="POST" action="/baitap/home/delete_category" onsubmit = "return deleteItem();">
						<button class='btn btn-warning left-margin' type="submit" name="delete" value="<?php echo $row['id']?>">Delete</button>
      				</form>

					<form method="POST" action="/baitap/home/view_product">
						<button class='btn btn-warning left-margin' type="submit" name="view_prd" value="<?php echo $row['id']?>">VIEW PRODUCT</button>	
					</form>
				</td>
			</tr>
  		<?php
  		}
  	?>
  </tbody>
</table>
<div class="back">
		<a href="/baitap/home/create_category" class="btn btn-warning left-margin">New</a>
</div>

<script type="text/javascript">
	function deleteItem() {
		option = confirm('Are you sure to delete this item?')
		if(!option) return false
		return true
	}
</script>
</body>
</html>