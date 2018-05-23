<?php
  require_once 'header.php';
  require_once '../koneksi.php';
  $sql = $mysqli->query("SELECT * FROM tb_transactions");
  // $trx_data = $mysqli->query($sql);
  // $trx_data = mysqli_fetch_assoc($sql);
  // $items = json_decode($trx_data['items'],true);
  $i = 1;
?>
<div class="content-wrapper">
  <section id="dashboard">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <div class="row">
        <div class="col-md-4 mx-auto">
          <h2 class="page-title text-center">Order Dashboard</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 mx-auto">
          <table class="table table-bordered table-striped table-hover table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Order</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Sub Total</th>
                <th>Ongkir</th>
                <th>Grand Total</th>
                <th>Status</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sql as $item) : ?>
              <tr>
                <td><?=$i;?></td>
                <td><?=$item['id'];?></td>
                <td><?=$item['nama_lengkap'];?></td>
                <td><?=$item['email'];?></td>
                <td><?=$item['nohp'];?></td>
                <td><?=$item['alamat'];?></td>
                <td><?=$item['sub_total'];?></td>
                <td><?=$item['ongkir'];?></td>
                <td><?=$item['grand_total'];?></td>
                <td>
                  
                  <div class="form-group">
                    <select name="cmb_status" class="form-control" id="cmb_status" style="width: 140px;">
                      <option value="pengambilan" <?php if ($item['status'] == "pengambilan") echo 'selected="selected"'; ?>>Pengambilan</option>
                      <option value="pencucian" <?php if ($item['status'] == "pencucian") echo 'selected="selected"'; ?>>Pencucian</option>
                      <option value="pengeringan" <?php if ($item['status'] == "pengeringan") echo 'selected="selected"'; ?>>Pengeringan</option>
                      <option value="pengantaran" <?php if ($item['status'] == "pengantaran") echo 'selected="selected"'; ?>>Pengantaran</option>
                      <option value="selesai" <?php if ($item['status'] == "selesai") echo 'selected="selected"'; ?>>Selesai</option>
                    </select>
                  </div>  
                </td>
                <td>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="1">
                    </label>
                  </div>
                </td>
              </tr>
              <?php 
                $i++; 
                endforeach; 
              ?>
            </tbody>
          </table>
          <button type="submit" class="btn btn-default">Update</button>
        </div>
      </div> 
    </div>
  </section>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
<?php
  require_once 'footer.php';
?>