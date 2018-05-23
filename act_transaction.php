<?php
require_once 'koneksi.php';
require_once 'header.php';
$action = isset($_POST['action']) ? $_POST['action'] : "";
if($action=='create') {
    $id_trx = $mysqli->real_escape_string($_POST['trx_id']);
    $txt_nama = $mysqli->real_escape_string($_POST['txt_nama']);
    $txt_email = $mysqli->real_escape_string($_POST['txt_email']);
    $txt_nohp = $mysqli->real_escape_string($_POST['txt_nohp']);
    $txt_alamat = $mysqli->real_escape_string($_POST['txt_alamat']);
    $txt_sub_total = $mysqli->real_escape_string($_POST['txt_sub_total']);
    $txt_ongkir = $mysqli->real_escape_string($_POST['txt_ongkir']);
    $txt_grand_total = $mysqli->real_escape_string($_POST['txt_grand_total']);
    $txt_cart_id = $mysqli->real_escape_string($_POST['txt_cart_id']);
    $query = "INSERT INTO tb_transactions SET 
            id = '{$id_trx}',
            nama_lengkap = '{$txt_nama}',
            email = '{$txt_email}',
            nohp = '{$txt_nohp}',
            alamat = '{$txt_alamat}',
            sub_total = '{$txt_sub_total}',
            ongkir = '{$txt_ongkir}',
            grand_total = '{$txt_grand_total}',
            cart_id = '{$txt_cart_id}'";
            

    if ($mysqli->query($query)) {
       
    }
    else {
        echo "Gagal menambahkan data";
        echo $query;
    }
    
}  
    $sql = $mysqli->query("SELECT
            tb_transactions.id as 'trx_id',
            tb_transactions.nama_lengkap as 'nama',
            tb_transactions.email as 'email',
            tb_transactions.nohp as 'nohp',
            tb_transactions.alamat as 'alamat',
            tb_transactions.sub_total as 'sub_total',
            tb_transactions.ongkir as 'ongkir',
            tb_transactions.grand_total as 'grand_total',
            tb_cart.id as 'cart_id',
            tb_cart.items as 'items',
            tb_transactions.cart_id
            FROM
            tb_cart
            INNER JOIN tb_transactions ON tb_transactions.cart_id = tb_cart.id WHERE tb_transactions.id = '{$id_trx}'
        ");
    // $trx_data = $mysqli->query($sql);
    $trx_data = mysqli_fetch_assoc($sql);
    $items = json_decode($trx_data['items'],true);
    $i = 1;
?>

<section id="detail-pembayaran">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2 class="page-title text-center">Detail Pemesanan</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <h5 class="sub-title">Order Details</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Id Pemesanan</th>
                            <td><?=$trx_data['trx_id'];?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><?=$trx_data['nama'];?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?=$trx_data['email'];?></td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td><?=$trx_data['nohp'];?></td>
                        </tr>
                        <tr>
                            <th>Alamat tujuan</th>
                            <td><?=$trx_data['alamat'];?></td>
                        </tr>
                        <tr>
                            <th>Sub total</th>
                            <td>Rp. <?=$trx_data['sub_total'];?></td>
                        </tr>
                        <tr>
                            <th>Ongkos kirim</th>
                            <td>Rp. <?=$trx_data['ongkir'];?></td>
                        </tr>
                        <tr>
                            <th>Grand total</th>
                            <td>Rp. <?=$trx_data['grand_total'];?></td>
                        </tr>
                        
                    </tbody>
                </table>

                <h5 class="sub-title">Order Items</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            
                        </tr>
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
                            
                        </tr>
                        <?php
                            $i++;
                        }
                        ?>

                    </thead>
                </table>

                <div class="content">
                    <strong>Catatan :</strong>
                    <ol>
                        <li>Petugas akan mendatangi alamat yang tertera maksimal 1x24 jam pada jam kerja.</li>
                        <li>Pembayaran dilakukan ketika petugas sudah mengambil dan mengecek orderan.</li>
                        <li>Harga yang tertera diatas adalah harga estimasi, bisa terjadi perubahan harga setelah pengecekan orderan oleh petugas.</li>
                        <li>Harap simpan Order ID anda untuk Track Order yang dapat dilakukan pada halaman utama website.</li>
                    </ol>
                    <strong>Terimakasih telah menggunakan jasa kami.</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once 'footer.php';
?>
