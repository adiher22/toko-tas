<?php 
$konfigurasi = $this->load->model('konfigurasi_model');
$site = $this->konfigurasi_model->listing();
$slider = $this->load->model('slider_model');
$banner = $this->slider_model->detail();

 ?>
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
		<?php foreach($banner as $slide) { ?>
		<?php if($slide->active) { ?>
			<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('assets/upload/image/'.$slide->gambar)?>); width: 1920px; height: 570px;">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo $site->tagline ?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?php echo $slide->judul_slider ?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="<?php echo base_url('produk') ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								BELI SEKARANG
							</a>
						</div>
					</div>
				</div>
				<?php }else { ?>
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('assets/upload/image/'.$slide->gambar)?>); width: 1920px; height: 570px;">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo $site->tagline ?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?php echo $slide->judul_slider ?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="<?php echo base_url('produk') ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								BELI SEKARANG
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
		<?php } ?>
		
  			</div>
		</div>
</section>