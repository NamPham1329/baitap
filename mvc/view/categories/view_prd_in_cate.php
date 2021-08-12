
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
		}
		.table td, .table th{
			border-top: 0px;
            border: 1px solid;
		}
		/* tr, td{
			border: 1px solid;
		} */
		.category{
			text-align: center;
		}
		.btn{
			margin-top: 5px;
		}
        .table{
            width: 60%;
            margin: auto;
            border: 1px solid;
            margin-top: 5%;
        }
		.back{
			text-align: center;
		}
		.header button{
			margin-left: 80%;
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
        <th scope="col">STT</th>
      	<th scope="col">PRODUCT NAME</th> 
	  	<th scope="col">PRICE (VND)</th> 
	  	<th scope="col">PRODUCT IMAGE</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
	  	$count = 1;
	  	$path = '../public/upload/';
  		while ($row = mysqli_fetch_array($data["type"])) {?>
  		 	<tr>
                <td><?php echo $count++ ?></td>
				<td><?php echo $row["prd_name"]; ?></td>
				<td><?php echo $row["price"]; ?></td>
				<td><img src="<?php echo $path.$row["prd_image"];?>" style="max-width: 100px;"></td>
			</tr>
  		<?php
  		}
  	?>
  </tbody>
</table>
<div class="back">
		<a href="/baitap/home/list_categories" class="btn btn-warning left-margin">BACK</a>
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