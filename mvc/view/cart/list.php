<?php 
if($_SESSION['users']['role_id'] !== 1)
{
	header('location: /project/home/');
}
require_once("./mvc/view/layout/header.php");
require_once("./mvc/view/layout/sidebar.php"); 
require_once("./mvc/view/layout/header_desktop.php");
?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">order list</h3>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>order id</th>
                                                <th>customer id</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($listCart)){
                                                $path = "../../upload/";
                                                foreach($listCart as $item){
                                            ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $item['id']?></td>
                                                <td><?php echo $item['customer_id']?></td>
                                                <td><?php echo $item['order_status']?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="/project/home/order?id=<?php echo $item['id'];?>" style="margin-right: 5px;">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                            <i class="zmdi zmdi-more"></i>
                                                            </button>
                                                        </a>
                                                        <form method="post" style="margin-right: 5px;">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="submit" name="delete" value="<?php echo $item['id']; ?>">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } }  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once("./mvc/view/layout/footer.php");?>  