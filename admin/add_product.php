<?php
  require_once 'header.php';
  require_once '../koneksi.php';
  // $sql = $mysqli->query("SELECT * FROM tb_products");
  // $trx_data = $mysqli->query($sql);
  // $trx_data = mysqli_fetch_assoc($sql);
  // $items = json_decode($trx_data['items'],true);
  $i = 1;

  $carikode = mysqli_query($mysqli, "select max(id) from tb_products") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
    $nilaikode = substr($datakode[0], 1);
    // menjadikan $nilaikode ( int )
    $kode = (int) $nilaikode;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $kode_otomatis = "B".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
    $kode_otomatis = "B0001";
  }
?>
<div class="content-wrapper">
  <section id="add-product">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Product</li>
      </ol>

      <div class="row">
        <div class="col-md-4 mx-auto">
          <h2 class="page-title text-center">Add Product</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8 mx-auto">
          <form action="act_add_product.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama_produk">ID Produk</label>
              <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?php echo  $kode_otomatis; ?>" placeholder="<?php echo  $kode_otomatis; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk" name="nama_produk" aria-describedby="emailHelp" placeholder="Masukkan Nama Produk">
            </div>
            <div class="form-group">
              <label for="harga">Password</label>
              <div class="input-group mb-2 mb-sm-0">
                <div class="input-group-addon">Rp.</div>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga">
              </div>
            </div>
            <div class="form-group">
              <label for="gambar">Upload Gambar Produk</label>
              <input type="file" class="form-control-file" id="gambar" name="Filename">
            </div>
            <input type="hidden" name="action" value="create" />
            <button type="submit" class="btn btn-default">Add</button>
          </form>
        </div>
      </div> 

    </div>
  </section>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
<?php
  require_once 'footer.php';
?>