<?php
require_once("checkout.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../mvc/view/front-end/css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <h4 style="text-align: center;">Thông tin người mua hàng</h4>
                <form method="POST" style="width: 50%; margin: auto;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name">
                  </div>
                  <br>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                  <br>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input id="email" type="text" class="form-control" name="address" placeholder="Address">
                  </div>
                  <br>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input id="email" type="text" class="form-control" name="phone" placeholder="Phone">
                  </div>

                  <br>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <textarea rows="5" class="form-control" style="resize: none;" name="content"></textarea>
                  </div>
                  
                  <br>
                 
                   <input type="submit" name="checkout" class="btn btn-success" value="Checkout">
                </form> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../mvc/view/front-end/js/scripts.js"></script>
    </body>
</html>