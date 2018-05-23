<?php
  require_once 'koneksi.php';
$action = isset($_POST['action']) ? $_POST['action'] : "";
$show_modal = false;
if($action=='track') {
  $id_track = $mysqli->real_escape_string($_POST['txt_track']);
  $sql = $mysqli->query("SELECT status FROM tb_transactions WHERE id = '{$id_track}'");
  // $track = $mysqli->query($sql);
  $track = mysqli_fetch_assoc($sql);
  $show_modal = false;

    
  if ($sql) {
    if (mysqli_num_rows($sql)==0) { 
      $show_modal = true;
      $status = "Tidak ditemukan Order ID" ;
    }
    else {
      $show_modal = true;
      $status = $track['status'];
    }
  }
  else {
    $show_modal = false;
      echo "Gagal";
      echo $sql;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />


    <title>Pangestu Laundry</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/flaticons/flaticon.css" rel="stylesheet" type="text/css">

    <!-- Include SmartCart CSS -->
    <link href="css/smart_cart.min.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/style.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Pangestu Laundry</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="booking.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#testimoni">Testimonials</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">PANGESTU</h1>
              <p class="intro-text">Pickup, Clean, and Delivery Service Laundry Indonesia.</p>
            </div>
          </div>
          <form class="track" action="#" method="POST">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-lg-offset-3">
                <div class="form-group">
                  <input type="text" name="txt_track" class="form-control" id="track" placeholder="Masukkan No Laundry anda">
                  <input type="hidden" name="action" value="track" />
                </div>
              </div>
              <div class="col-lg-2">
                <button type="submit" class="btn btn-primary">Track Order</button>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-12 mx-auto">
              <a href="#about" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Apa itu Pangestu Laundry?</h2>
            <p>
              Kami memberikan Pelayanan Jasa Laundry sesuai kepuasan konsumen.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="step-card text-center">
              <i class="flaticon-smartphone"></i>
              <div class="step-title">
                Order
              </div>
              <div class="step-content">
                Pesan jasa laundry kami secara online dan kami akan segera menyiapkan tas.
              </div>
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            </div>
          </div>
          <div class="col-md-3">
            <div class="step-card text-center">
              <i class="flaticon-delivery-truck"></i>
              <div class="step-title">
                Jemput
              </div>
              <div class="step-content">
                Penjemputan secara gratis dalam waktu 24 jam hanya beritahu alamat anda, rumah atau kantor.
              </div>
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            </div>
          </div>
          <div class="col-md-3">
            <div class="step-card text-center">
              <i class="flaticon-washing-machine-for-laundry"></i>
              <div class="step-title">
                Cuci
              </div>
              <div class="step-content">
                Pencucian terbaik untuk setiap baju anda, kami menjamin garansi kualitas pada semua item.
              </div>
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            </div>
          </div>
          <div class="col-md-3">
            <div class="step-card text-center">
              <i class="flaticon-delivery-truck-1"></i>
              <div class="step-title">
                Antar
              </div>
              <div class="step-content">
                Kami akan mengantar baju anda kembali dimanapun dan kapanpun.
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimoni Section -->
    <section id="testimoni" class="testimoni-section content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Pendapat orang tentang kami</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div id="testimoni-slider" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#testimoni-slider" data-slide-to="0" class="active"></li>
                <li data-target="#testimoni-slider" data-slide-to="1"></li> 
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="col-md-4">
                    <div class="testi-card">
                      <div class="profile-picture">
                        <img src="img/pp/dian.jpg" class="img-fluid">
                      </div>
                      <p class="nama">Dian Sastro</p>
                      <div class="content">
                        <p>
                          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="testi-card">
                      <div class="profile-picture">
                        <img src="img/pp/reza.jpg" class="img-fluid">
                      </div>
                      <p class="nama">Reza Rahardian</p>
                      <div class="content">
                        <p>
                          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="testi-card">
                      <div class="profile-picture">
                        <img src="img/pp/raisa.jpg" class="img-fluid">
                      </div>
                      <p class="nama">Raisa</p>
                      <div class="content">
                        <p>
                          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        </p>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="carousel-item">
                  <div class="col-md-4">
                    <div class="testi-card">
                      <div class="profile-picture">
                        <img src="img/pp/teuku.jpg" class="img-fluid">
                      </div>
                      <p class="nama">Teuku Wisnu</p>
                      <div class="content">
                        <p>
                          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="testi-card">
                      <div class="profile-picture">
                        <img src="img/pp/isyana.jpg" class="img-fluid">
                      </div>
                      <p class="nama">Isyana Saraswati</p>
                      <div class="content">
                        <p>
                          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        </p>  
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="testi-card">
                      <div class="profile-picture">
                        <img src="img/pp/rizky.jpg" class="img-fluid">
                      </div>
                      <p class="nama">Rizky Febian</p>
                      <div class="content">
                        <p>
                          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#testimoni-slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#testimoni-slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Get In Touch</h2>
            <p>Jangan ragu untuk bertanya pada kami</p>
            <ul class="list-inline banner-social-buttons">
              <li class="list-inline-item">
                <a href="https://twitter.com/" class="btn btn-default btn-lg" target="_blank">
                  <i class="fa fa-twitter fa-fw"></i>
                  <span class="network-name">Twitter</span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://instagram.com/" class="btn btn-default btn-lg" target="_blank">
                  <i class="fa fa-instagram fa-fw"></i>
                  <span class="network-name">Instagram</span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://facebook.com/" class="btn btn-default btn-lg" target="_blank">
                  <i class="fa fa-facebook fa-fw"></i>
                  <span class="network-name">Facebok</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Map Section -->
    <a href="https://goo.gl/maps/RWgpfQhy2U12" target="_blank"> 
      <div id="maps"></div>
    </a>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Status Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <?=$track['status'];?> -->
            <?php echo $status; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>


<?php
  require_once 'footer.php';
?>
<?php if($show_modal):?>
  <script> $('#myModal').modal('show');</script>
<?php endif;?>