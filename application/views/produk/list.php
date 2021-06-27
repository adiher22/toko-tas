<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" class="banner" style="background-image: url(<?php echo base_url('assets/upload/image/'.$site->banner) ?>); width: 1900; height: auto;">
<h2 class="l-text2 t-center">
<?php if($this->session->flashdata('info')) {
				echo '<div class="alert alert-info">';
				echo $this->session->flashdata('info');
				echo '</div>';
		}
		 ?>
</h2>
<p class="m-text13 t-center">
<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
	<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
		<div class="leftbar p-r-20 p-r-0-sm">
			<!--  -->
			<h4 class="m-text14 p-b-7">
				Kategori Produk
			</h4>

			<ul class="p-b-54">
				<?php foreach ($listing_kategori as $listing_kategori) { ?>
				<li class="p-t-4">
					<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
					<?php echo $listing_kategori->nama_kategori ?>
								
						
					</a>
				</li>
				<?php } ?>
				
			</ul>
			
			<strong>Kritik dan Saran</strong><br><hr>
			<marquee behavior="scroll" direction="up">
			<div class="card" style="width: 18rem;">
				
				<?php foreach($bukutamu as $bukutamu) { ?>
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $bukutamu['nama_lengkap']; ?></h5>
			    <h6 class="card-subtitle mb-2 text-muted"></h6>
			    <p class="card-text"><?php echo $bukutamu['pesan']; ?></p>

			    <div class="clrearfix"></div>
			  </div>
			  <?php } ?>
			</div>
			</marquee>
		
		</div>
	</div>
	<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

		<!-- Product -->
		<div class="row">
			<?php foreach ($produk as $produk) { ?>
				
			
			<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
				<!-- Form untuk memproses belanjaan -->
			<?php echo form_open(base_url('belanja/add')); 

			// <!-- Elemen yg dibawa -->
			
			 echo form_hidden('id', $produk->id_produk);
			 echo form_hidden('qty', 1);
			 echo form_hidden('price', $produk->harga);
			 echo form_hidden('weight', $produk->berat);
			 echo form_hidden('name', $produk->nama_produk);
			 // Eelemen Redirect 
			 echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

			?>
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
						<img class="img-responsive" src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="responsive" width="100%" height="300" alt="<?php echo $produk->nama_produk ?>">

						<div class="block2-overlay trans-0-4">
							<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<i class="fa fa-eye dis-none" aria-hidden="true"></i>
							</a>

							<div class="block2-btn-addcart w-size1 trans-0-4">
								<!-- Button -->
								<?php if($produk->stok > 1) { ?>
								<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
									Beli
								</button>
								<?php } else { ?> 
								<button type="submit" value="submit" class="btn btn-danger" <?php echo 'disabled'; ?>>
									STOK HABIS
								</button>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="block2-txt p-t-20">
						<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
							<?php echo $produk->nama_produk ?>
						</a>

						<span class="block2-price m-text6 p-r-5">
						IDR <?php echo number_format($produk->harga,'0','.','.') ?>
						</span>
					</div>
				</div>
				<?php  echo form_close(); ?>
			</div>
		<?php } ?>
			
			
		</div>

		<!-- Pagination -->
		<div class="pagination flex-m flex-w p-t-26">
			<?php echo $pagination; ?>
		</div>
	</div>
</div>
</div>
</section>