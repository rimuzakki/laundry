<?php
  require_once 'header.php';
  require_once '../koneksi.php';
  $sql = $mysqli->query("SELECT * FROM tb_products");
  // $trx_data = $mysqli->query($sql);
  // $trx_data = mysqli_fetch_assoc($sql);
  // $items = json_decode($trx_data['items'],true);
  $i = 1;
?>
<div class="content-wrapper">
  <section id="products">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Products</li>
      </ol>

      <div class="row">
        <div class="col-md-4 mx-auto">
          <h2 class="page-title text-center">Products</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mx-auto">
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar Produk</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sql as $item) : ?>
              <tr>
                <td><?=$i;?></td>
                <td><?=$item['id'];?></td>
                <td><?=$item['nama_produk'];?></td>
                <td><?=$item['harga_produk'];?></td>
                <td>
                  <?php $photos = explode(',',$item['gambar_produk']); ?>
                  <img data-name="product_image" class="img-fluid" src="../img/product/<?=$photos[0];?>" alt="<?=$item['nama_produk'];?>">
                </td>
              </tr>
              <?php 
                $i++; 
                endforeach; 
              ?>
            </tbody>
          </table>
        </div>
      </div> 

    </div>
  </section>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
<?php
  require_once 'footer.php';
?>