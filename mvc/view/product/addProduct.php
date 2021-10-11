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
                                <div class="card">
                                  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-header">
                                        <strong>New Product</strong>
                                    </div>
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="name" value="" type="text" id="text-input"  placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="price" value="" type="text" id="text-input" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="image" value="" type="file" id="file-input" class="form-control-file">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Detail</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="detail" value="" type="text" id="text-input" placeholder="Text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Category ID</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category_id" id="select" class="form-control">
                                                    <?php
                                                        foreach ($listCategories as $item){
                                                            echo "<option value=".$item['id'].">"
                                                                .$item["category_name"].
                                                            "</option>";
                                                        echo "<br>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="add_prd" value="save">
                                            <i class="fa fa-dot-circle-o"></i>Save
                                        </button>
                                    </div>
                                  </form>
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