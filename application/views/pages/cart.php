
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php if ($this->cart->contents()) {
                 ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="width: 120px;">Image</td>
							<td class="item text-center" style="width: 200px;">Item</td>
							<td class="price text-center">Price</td>
							<td class="quantity text-center" style="width: 50px; ">Quantity</td>
							<td class="total text-center">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        <?php
                        $subTotal = 0;
                        $total = 0;
                        foreach ($this->cart->contents() as $key => $item) {
                            $subTotal = $item['qty'] * $item['price'];
                            $total =+ $subTotal;
                        ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url('uploads/product/'. $item['options']['image']) ?>" width="100" height="100" alt="<?php echo $item['name'] ?>"></a>
							</td>
							<td class="cart_description" style="overflow: auto;">
								<h4 ><a  href=""><?php echo $item['name'] ?></a></h4>
							</td>
							<td class="cart_price text-center">
								<p><?php echo number_format($item['price'], 0, ',', '.') ?> VND</p>
							</td>
							<td class="cart_quantity text-center">
								<form action="<?php echo base_url('update-cart-item') ?>" method="post">
								<div class="cart_quantity_button">
									
									<input type="hidden" value="<?php echo $item['rowid'] ?>" name="rowid">
									<input class="cart_quantity_input" type="number" min="1" width="100" name="quantity" value="<?php echo $item['qty'] ?>" autocomplete="off" size="2">
									<input type="submit" name="capnhat" class="btn btn-warning" value="Cập nhật">
								</div>
								</form>
							</td>
							<td class="cart_total text-center" >
								<p class="cart_total_price"><?php echo number_format($subTotal, 0, ',', '.') ?> VND</p>
							</td>
							<td class="cart_delete text-center">
								<a class="cart_quantity_delete" href="<?php echo base_url('delete-item/'.$item['rowid']) ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        <?php }?>
						
                        <tr>
                            
							<td class="text-center"><a href="<?php echo base_url('delete-all-cart') ?>" class="btn btn-danger">Xóa tất cả</a></td>
                            <td class="cart_total_price text-center" colspan="4"> Tổng Tiền:
								<p >  <?php echo number_format($subTotal, 0, ',', '.') ?> VND</p>
							</td>
							<td><a href="<?php echo base_url('checkout') ?>" class="btn btn-success ">Thanh toán</a></td>
                        </tr>
					</tbody>
				</table>

                <?php }else{
                    echo '<span class="text text-danger">Hãy thêm sản phẩm vào giỏ hàng</spand>';
                } ?>
			</div>
		</div>
	</section> <!--/#cart_items-->