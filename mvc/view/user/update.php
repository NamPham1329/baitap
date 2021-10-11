<?php
if($_SESSION['users']['role_id'] !== 1)
{
	header('location: /project/home/');
}
require_once("./mvc/view/layout/header.php");
require_once("./mvc/view/layout/sidebar.php");
require_once("./mvc/view/layout/header_desktop.php");
?>
MAIN CONTENT
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>
                                <h3 class="title-5 m-b-35">update role</h3>
                            </strong>
                        </div>
                        <form action="" method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-sm-6">
                                    <label for="select" class=" form-control-label">ID User:</label>
                                        <input name="id" value="<?php
                                                                if (!empty($idUser)) {
                                                                    foreach ($idUser as $value) {
                                                                        echo $value['id'];
                                                                    }
                                                                }
                                                                ?>" type="text" id="input-large" class="input-lg form-control-lg form-control" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-6">
                                        <label for="select" class=" form-control-label">User Name:</label>
                                        <input name="name" value="<?php
                                                                    if (!empty($idUser)) {
                                                                        foreach ($idUser as $value) {
                                                                            echo $value['username'];
                                                                        }
                                                                    }
                                                                    ?>" type="text" id="input-large" name="input-large" placeholder="Enter name role" class="input-lg form-control-lg form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6 col-md-6">
                                        <label for="select" class=" form-control-label">Role:</label>
                                        <select name="role" id="select" class="form-control">
                                            <?php
                                            foreach ($listRole as $item) {
                                                echo "<option value=" . $item['id'] . ">"
                                                    . $item["role_name"] .
                                                    "</option>";
                                                echo "<br>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button name="updateUser" value="update" type="submit" class="btn btn-primary btn-sm">
                                    SAVE
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

<?php require_once("./mvc/view/layout/footer.php"); ?>