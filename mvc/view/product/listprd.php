<?php
if($_SESSION['users']['role_id'] !== 1)
{
	header('location: /project/home/');
}
require_once("./mvc/view/layout/header.php");
require_once("./mvc/view/layout/sidebar.php");
require_once("./mvc/view/layout/header_desktop.php");
?>

<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- DATA TABLE -->
					<h3 class="title-5 m-b-35">product</h3>
					<div class="table-data__tool">
						<div class="table-data__tool-right" style="position: absolute; right: 2%;">
							<a href="/project/home/add_product">
								<button class="au-btn au-btn-icon au-btn--green au-btn--small">
									<i class="zmdi zmdi-plus"></i>add item
								</button></a>
						</div>
					</div>
					<div class="table-responsive table-responsive-data2">
						<table class="table table-data2">
							<thead>
								<tr>
									<th>name</th>
									<th>image</th>
									<th>description</th>
									<th>category</th>
									<th>price</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($allProduct)) {
									$path = "../public/upload/";
									foreach ($allProduct as $item) {
								?>
										<tr class="tr-shadow">
											<td><?php echo $item['product_name'] ?></td>
											<td>
												<img src="<?php echo $path . $item['product_img'] ?>" style="max-width: 100px;">
											</td>
											<td class="desc"><?php echo $item['product_detail'] ?></td>
											<td><?php echo $item['category_id'] ?></td>
											<td><?php echo "$" . $item['price'] ?></td>
											<td>
												<div class="table-data-feature">
													<a href="/project/home/update_product?id_product=<?php echo $item['id']; ?>" style="margin-right: 5px;">
														<button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
															<i class="zmdi zmdi-edit"></i>
														</button>
													</a>

													<form method="post" style="margin-right: 5px;">
														<button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="submit" name="delete" value="<?php echo $item['id']; ?>">
															<i class="zmdi zmdi-delete"></i>
														</button>
													</form>

													<button class="item" data-toggle="tooltip" data-placement="top" title="More">
														<i class="zmdi zmdi-more"></i>
													</button>
												</div>
											</td>
										</tr>
								<?php }
								} ?>
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
<?php require_once("./mvc/view/layout/footer.php"); ?>