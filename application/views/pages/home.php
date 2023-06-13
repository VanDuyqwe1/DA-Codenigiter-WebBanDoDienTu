
		
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<!-- <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div> -->
							<!-- <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div> -->
							
							<?php foreach ($category as $key => $cate) {
                                
                            ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo base_url('danh-muc/'. $cate->id)  ?>"><?php echo $cate->title?></a></h4>
								</div>
							</div>
                            <?php } ?>
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
						
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                <?php foreach ($brand as $key => $bra) {  ?>
									<li><a href="<?php echo base_url('thuong-hieu/'. $bra->id)  ?>"><?php echo $bra->title?></a></li>
                                <?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        <?php foreach ($allproduct_pagination as $key => $pro) { ?>
						<form action="<?php echo base_url('add-to-cart') ?>" method="post">
							<div class="col-sm-4 ">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<input id="id"  type="hidden" value="<?php echo $pro->id ?>" name="product_id">
												<input type="hidden" min="1" value="1" name="quantity"/>
												<img src="<?php echo base_url('/uploads/product/'.$pro->image) ?>" alt="<?php echo $pro->title ?>" width="100" height="200"/>
												<h2><?php echo number_format($pro->price, 0, ',', '.') ?>VND</h2>
												<p><?php echo $pro->title ?></p>
												<a href="<?php echo base_url('san-pham/'.$pro->id) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Detail</a>
												<button type="submit" class="btn btn-fefault add-to-cart">
													<i class="fa fa-shopping-cart"></i>
													Add to cart
												</button>
											</div>
											
									</div>
									<!-- <div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div> -->
								</div>
							</div>
						</form>
						<?php } ?>
						
					</div><!--features_items-->
				
					<?php echo $links; ?>
				
					
				</div>
			</div>
		</div>
	</section>
	
	
