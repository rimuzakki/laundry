<?php
  require_once 'header.php';
  require_once 'koneksi.php';
?>
<?php

// Get the results as JSON string
$product_list = filter_input(INPUT_POST, 'cart_list');
// Convert JSON to array
$product_list_array = json_decode($product_list);
$cart_id = $_POST["cart_id"];

$result_html = '';
if($product_list_array) {
    foreach($product_list_array as $p) {
        foreach($p as $key => $value) {
            //var_dump($key, $value);
            $result_html .= $key.": ".$value."<br />";
        }
        $result_html .= '------------------------------------------<br />';
    }
} else {	
	$result_html .= "<strong>Cart is Empty</strong>";
}

$sql = "insert into tb_cart (id,items) values ('{$cart_id}','{$product_list}')";
if ($mysqli->query($sql) === TRUE) {
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


if ($cart_id != '') {
    $cartQ = $mysqli->query("SELECT * FROM tb_cart WHERE id = '{$cart_id}'");
    $result = mysqli_fetch_assoc($cartQ);
    $items = json_decode($result['items'],true);
    $i = 1;
    $sub_total = 0;
    $item_count = 0;
    
    $carikodetrx = mysqli_query($mysqli, "select max(id) from tb_transactions") or die (mysql_error());
    // menjadikannya array
    $datakodetrx = mysqli_fetch_array($carikodetrx);
    // jika $datakode
    if ($datakodetrx) {
        $nilaikodetrx = substr($datakodetrx[0], 1);
        // menjadikan $nilaikode ( int )
        $kodetrx = (int) $nilaikodetrx;
        // setiap $kode di tambah 1
        $kodetrx = $kodetrx + 1;
        $kode_otomatistrx = "T".str_pad($kodetrx, 4, "0", STR_PAD_LEFT);
    } else {
        $kode_otomatistrx = "T0001";
    }
}

?>


<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2 class="page-title text-center">Checkout Page</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($items as $item) {
                            $product_id = $item['product_id'];
                            $productQ = $mysqli->query("SELECT * FROM tb_products WHERE id = '{$product_id}'");
                            $product = mysqli_fetch_assoc($productQ);
                            
                        ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=$product['nama_produk'];?></td>
                            <td>Rp. <?=$product['harga_produk'];?></td>
                            <td><?=$item['product_quantity'];?></td>
                            <td>Rp. <?=$item['product_quantity'] * $product['harga_produk'];?></td>
                        </tr>

                        <?php
                            $i++;
                            $item_count += $item['product_quantity'];
                            $sub_total += ($product['harga_produk'] * $item['product_quantity']);
                            }
                            $tax = 0.1 * $sub_total;
                            $grand_total = $tax + $sub_total;
                        ?>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <legend>Total</legend>
                    <thead>
                        <th>Total Item</th>
                        <th>Sub Total</th>
                        <th>Shipping</th>
                        <th>Grand Total</th>
                    </thead>
                    <tbody>
                        <td><?=$item_count;?></td>
                        <td>Rp. <?=$sub_total;?></td>
                        <td>Rp. <?=$tax;?></td>
                        <td>Rp. <?=$grand_total;?></td>
                    </tbody>
                </table>
            </div>
        </div>
        

        <!-- <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cart Products
                    </div>
                    <div class="panel-body">
                        Full JSON Result<hr />
                        <code>
                            <?= isset($product_list) ? $product_list : '' ?>
                        </code>
                        <br /><br />
                        Product List<hr />
                            <?= isset($result_html) ? $result_html : '' ?>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2 class="page-title text-center">Form Checkout</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="act_transaction.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="txt_nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input type="email" name="txt_email" class="form-control" id="email" placeholder="Alamat Email">
                    </div>
                    <div class="form-group">
                        <label for="nama">No. Hp</label>
                        <input type="text" name="txt_nohp" class="form-control" id="nohp" placeholder="08xxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea name="txt_alamat" class="form-control" id="alamat" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="txt_sub_total" value="<?= '{$sub_total}'; ?>">
                    <input type="hidden" name="txt_ongkir" value="<?php echo $tax; ?>">
                    <input type="hidden" name="txt_sub_total" value="<?php echo $sub_total; ?>">
                    <input type="hidden" name="txt_grand_total" value="<?php echo $grand_total; ?>">
                    <input type="hidden" name="txt_cart_id" value="<?php echo $cart_id; ?>">
                    <input type="hidden" name="trx_id" value="<?php echo $kode_otomatistrx; ?>">
                    <input type="hidden" name="action" value="create" />
                    <button type="submit" class="btn btn-default">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</section>  



<?php
  require_once 'footer.php';
?>