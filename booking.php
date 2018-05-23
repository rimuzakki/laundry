<?php
  require_once 'header.php';
  require_once 'koneksi.php';

  $sql = "SELECT * FROM tb_products";
  $produk = $mysqli->query($sql);

	$carikode = mysqli_query($mysqli, "select max(id) from tb_cart") or die (mysql_error());
	// menjadikannya array
	$datakode = mysqli_fetch_array($carikode);
	// jika $datakode
	if ($datakode) {
		$nilaikode = substr($datakode[0], 1);
		// menjadikan $nilaikode ( int )
		$kode = (int) $nilaikode;
		// setiap $kode di tambah 1
		$kode = $kode + 1;
		$kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
	} else {
		$kode_otomatis = "P0001";
	}
?>

<section id="order">
	<div class="container">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<h2 class="page-title text-center">Product</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php foreach ($produk as $item) : ?>
					<div class="col-md-4 col-sm-6">
						<div class="card sc-product-item">
							<div class="card-image">
								<?php $photos = explode(',',$item['gambar_produk']); ?>
								<img data-name="product_image" class="img-fluid" src="img/product/<?=$photos[0];?>" alt="<?=$item['nama_produk'];?>">
							</div>
							<div class="card-content">
								<div class="card-title">
									<p data-name="product_name"><?=$item['nama_produk'];?></p>
								</div>
								<!-- <p class="product-desc" data-name="product_desc"><?=$item['desc_produk'];?></p> -->
								<strong class="price">Rp. <?=$item['harga_produk'];?></strong>

								<input name="product_price" value="<?=$item['harga_produk'];?>" type="hidden" />
		                        <input name="product_id" value="<?=$item['id'];?>" type="hidden" />
							</div>
							<div class="card-action">
		                        <button class="sc-add-to-cart btn btn-primary">Add to cart</button>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

					<!-- <div class="col-md-4 col-sm-6">
						<div class="card sc-product-item">
							<div class="card-image">
								<img data-name="product_image" class="img-fluid" src="img/product/DinnerJacket.jpg" alt="...">
							</div>
							<div class="card-content">
								<div class="card-title">
									<p data-name="product_name">Product 1</p>
								</div>
								<p class="product-desc" data-name="product_desc">Product details</p>
								<strong class="price">$2,990.50</strong>

								<input name="product_price" value="2990.50" type="hidden" />
		                        <input name="product_id" value="12" type="hidden" />
							</div>
							<div class="card-action">
		                        <button class="sc-add-to-cart btn btn-primary">Add to cart</button>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-6">
						<div class="card sc-product-item">
							<div class="card-image">
								<img data-name="product_image" class="img-fluid" src="img/product/DinnerJacket.jpg" alt="...">
							</div>
							<div class="card-content">
								<div class="card-title">
									<p data-name="product_name">Product 1</p>
								</div>
								<p class="product-desc" data-name="product_desc">Product details</p>
								<strong class="price">$2,990.50</strong>

								<input name="product_price" value="2990.50" type="hidden" />
		                        <input name="product_id" value="12" type="hidden" />
							</div>
							<div class="card-action">
		                        <button class="sc-add-to-cart btn btn-primary">Add to cart</button>
							</div>
						</div>
					</div>-->

				</div>
			</div>

			<div class="col-md-4">
				<!-- Cart submit form -->
                <form action="results.php" method="POST"> 
                    <!-- SmartCart element -->
                    <div id="smartcart"></div>
                    <input name="cart_id" value="<?php echo $kode_otomatis ?>" type="hidden" />
                </form>
			</div>
		</div>
	</div>
</section>

<?php
    require_once 'footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
        // Initialize Smart Cart    	
        $('#smartcart').smartCart({
        	// Language variables
			  lang: {  
			    cartTitle: "Laundry Basket",
			    checkout: 'Checkout',
			    clear: 'Clear',
			    subtotal: 'Subtotal:',
			    cartRemove:'×',
			    cartEmpty: 'Basket is Empty!<br />Choose your products'
			  },
			  // currency settings
			  currencySettings: {
			    locales: 'id', // A string with a BCP 47 language tag, or an array of such strings
			    currencyOptions:  {
			        style: 'currency', 
			        currency: 'IDR', 
			        currencyDisplay: 'symbol'
			      } // extra settings for the currency formatter. Refer: https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Number/toLocaleString
			  }
        });
	});
</script>
</body>
</html>