<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
<a href="<?php echo base_url() ?>" class="s-text16">
	Home
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<a href="<?php echo base_url('produk') ?>" class="s-text16">
	Produk
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<span class="s-text17">
	<?php echo $title; ?>
</span>
</div>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
<div class="flex-w flex-sb">
	<div class="w-size13 p-t-30 respon5">
		<div class="wrap-slick3 flex-sb flex-w">
			<div class="wrap-slick3-dots"></div>

			<div class="slick3">
				<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>">
					<div class="wrap-pic-w">
						<img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>" class="img-responsive" class="gambar">
					</div>
				</div>
				<?php if($gambar) { foreach ($gambar as $gambar) { ?>
				
				<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>">
					<div class="wrap-pic-w">
						<img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>"  alt="IMG-PRODUCT">
					</div>
				</div>
				<?php	
				}//tutup foreach
				}//tutup if
				 ?>
			</div>
		</div>
	</div>

	<div class="w-size14 p-t-30 respon5">
		<h1 class="product-detail-name m-text20 p-b-13">
			<?php echo $title ?>
		</h1>
					<!-- Form untuk memproses belanjaan -->
			<?php echo form_open(base_url('belanja/add')); 

			// <!-- Elemen yg dibawa -->
			
			 echo form_hidden('id', $produk->id_produk);
			// echo form_hidden('qty', 1);
			 echo form_hidden('price', $produk->harga);
			 echo form_hidden('name', $produk->nama_produk);
			 // Eelemen Redirect 
			 echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

			?>
		<span class="price">
			IDR <?php echo number_format($produk->harga,'0','.','.') ?>
		</span>

		<p class="s-text8 p-t-10">
			Berat : <?php echo $produk->berat ?> gram
		</p>
		<p class="s-text8 p-t-10">
			Ukuran : <?php echo $produk->ukuran ?> cm
		</p>

		<p class="s-text8 p-t-10">
			Keterangan : <?php echo $produk->keterangan ?>
		</p>
		<!-- Ambil keranjang looping -->
		<?php foreach($keranjang as $keranjang) { ?>
		<!-- tampilkan data keranjang kurang stok -->
		<!-- tutup looping -->
		<?php } ?>
		<div class="p-t-33 p-b-60">

			<div class="flex-r-m flex-w p-t-10">
				<div class="w-size16 flex-m flex-w">
					<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
						<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
						</button>
						
						<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1" max="<?php echo $produk->stok ?>">

						
						<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
						</button>		
					</div>
					<p>Stok produk saat ini :</p><strong><?php echo $produk->stok ?></strong>
					<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
						<!-- Button -->
						<?php if($produk->stok > 1){ ?>
							
						<button type="submit" name="submit" value="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Beli
						</button>
						<?php } else{ ?>
						<button type="submit" name="submit" value="submit" class="btn btn-danger" <?php echo 'disabled'; ?>>
						STOK HABIS
						</button>
						<?php } ?>
						
					</div>
				</div>
			</div>
		</div>

		<?php  echo form_close(); ?>
	</div>
</div>
</div>
<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
<div class="container">
	<div class="sec-title p-b-60">
		<h3 class="m-text5 t-center">
			Produk Ransel Lainnya
		</h3>
	</div>

	<!-- Slide2 -->
<div class="wrap-slick2">
	<div class="slick2">
	<?php foreach ($produk_related as $produk_related) { ?>
		<div class="item-slick2 p-l-15 p-r-15">
			<!-- Form untuk memproses belanjaan -->
			<?php echo form_open(base_url('belanja/add')); ?>

			<!-- Elemen yg dibawa -->
			<?php
			 echo form_hidden('id', $produk_related->id_produk);
			 echo form_hidden('qty', 1);
			 echo form_hidden('price', $produk_related->harga);
			 echo form_hidden('name', $produk_related->nama_produk);
			 // Eelemen Redirect 
			 echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

			?>
			<!-- Block2 -->
			<div class="block2">
				<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
					<img class="img-responsive" src="<?= base_url('assets/upload/image/'.$produk_related->gambar);?>" class="responsive" width="100%" height="300" alt="<?php echo $produk_related->nama_produk ?>">

					<div class="block2-overlay trans-0-4">
						<a href="" class="block2-btn-addwishlist hov-pointer trans-0-4">
							<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
							<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
						</a>

						<div class="block2-btn-addcart w-size1 trans-0-4">
							<!-- Button Belanja -->
							<?php if($produk_related->stok > 1){ ?>
							<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
								BELI
							</button>
							<?php } else{ ?>
							<button type="submit" name="submit" value="submit" class="btn btn-danger" <?php echo 'disabled'; ?>>
							STOK HABIS
							</button>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="block2-txt p-t-20">
					<a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
						<?php echo $produk_related->nama_produk ?>
					</a>

					<span class="block2-price m-text6 p-r-5">
						IDR <?php echo number_format($produk_related->harga,'0','.','.') ?>
					</span>
				</div>
			</div>
			<?php 
			echo form_close(); 
			 ?>
			</div>
			<?php } ?>
		</div>
	</div>

		
</div>
</section>
