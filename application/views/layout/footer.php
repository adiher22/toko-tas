<?php 
// Ambil Data Konfigurasi Website
$site = $this->konfigurasi_model->listing();
$nav_produk_footer = $this->konfigurasi_model->nav_produk();
?>
<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90" >
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					KONTAK KAMI
				</h4>

				<div>
					<p class="s-text7 w-size27">
						<br><i class="fa fa-envelope"></i> <?php echo $site->email ?>
						<br><i class="fa fa-phone"></i> <?php echo $site->telepon ?>
					</p>

					<div class="flex-m p-t-30">
						
					
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Kategori Produk
				</h4>

				<ul>
					<?php foreach($nav_produk_footer as $nav_produk_footer) { ?>
					<li class="p-b-9">
						<a href="<?php echo base_url('produk/kategori/'.$nav_produk_footer->slug_kategori) ?>" class="s-text7">
							<?php echo $nav_produk_footer->nama_kategori ?>
						</a>
					</li>

					<?php } ?>
				</ul>
			</div>
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon5">
				<li>
				<a href="https://www.bankmandiri.co.id/" target="_blank"><img src="<?php echo base_url('assets/upload/image/BankMandiri.png'); ?>" alt=""></a>
			   </li>
			</div>
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon5">
				<li>
				<a href="https://www.syariahmandiri.co.id/" target="_blank"><img src="<?php echo base_url('assets/upload/image/BankMandiriSya.png'); ?>" alt=""></a>
				</li>
			</div>
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon5">
				<li>
				<a href="https://www.bca.co.id/" target="_blank"><img src="<?php echo base_url('assets/upload/image/BankBca.png'); ?>" alt=""></a>
				</li>
			</div>
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon5">
				<li>
				<a href="https://bri.co.id/" target="_blank"><img src="<?php echo base_url('assets/upload/image/BankBri.png'); ?>" alt=""></a>
				</li>
			</div>
		
		</div>

		<div class="t-center p-l-15 p-r-15">

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="watermark">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url();?>assets/template/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript"> 
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Ditambahkan kekeranjang !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
	<script type="text/javascript">
   function TampilOngkir() {
	var tes = document.getElementById("id_ongkir").value;
        document.getElementById("ongkir").value=tes;
        
}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		})
	})
	 $(document).ready(function() {
          <?php if($this->uri->segment(1) == 'registrasi' || $this->uri->segment(1) == 'Registrasi') {
            ?>
              $('#prov').change(function() {
                var prov = $('#prov').val();
                var province = prov.split(',');

                $.ajax({
                  url: "<?=base_url();?>registrasi/city",
                  method: "POST",
                  data: { prov : province[0] },
                  success: function(obj) {
                    $('#kota').html(obj);
                  }

                });
              });

<?php } ?>
});
	 $('#provinsi_penerima').change(function() {
                var prov = $('#provinsi_penerima').val();
                var province = prov.split(',');

                $.ajax({
                  url: "<?=base_url();?>belanja/city",
                  method: "POST",
                  data: { prov : province[0] },
                  success: function(obj) {
                    $('#kota_penerima').html(obj);
                  }

                });
              });
       
              $('#kota_penerima').change(function() {
                var kabupaten = $('#kota_penerima').val();
                var kota_penerima = kabupaten.split(',');
                var kurir = $('#kurir').val();
                var kota_pengirim = $('#kota_pengirim').val();
                $.ajax({
                  url: "<?=base_url();?>belanja/getcost",
                  method: "POST",
                  data: { kota_penerima : kota_penerima[0], kurir : kurir, kota_pengirim : kota_pengirim},
                  success: function(obj) {
                    $('#layanan').html(obj);

                  }

                });
              });
              
               $('#kurir').change(function() {
                var kabupaten = $('#kota_penerima').val();
                var kota_penerima = kabupaten.split(',');
                var kurir = $('#kurir').val();
                var kota_pengirim = $('#kota_pengirim').val();
                $.ajax({
                  url: "<?=base_url();?>belanja/getcost",
                  method: "POST",
                  data: { kota_penerima : kota_penerima[0], kurir : kurir, kota_pengirim : kota_pengirim},
                  success: function(obj) {
                    $('#layanan').html(obj);
                  }

                });
              });

              $('#layanan').change(function() {
                var layanan = $('#layanan').val();
               

                $.ajax({
                  url: "<?=base_url();?>belanja/cost",
                  method: "POST",
                  data: { layanan : layanan },
                  success: function(obj) {
                    var hasil = obj.split(",");

                    $('#ongkir').val(hasil[0]);
                    // $('#total').val(hasil[1]);
                  }

                });
              });
	
</script>

<!--===============================================================================================-->
	<script src="<?= base_url();?>assets/template/js/main.js"></script>

</body>
</html>
