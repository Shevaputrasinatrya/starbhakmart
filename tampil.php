<?php
session_start();
require 'koneksi.php';
$barang = query(
    'SELECT stockbarang.id,stockbarang.nama,stockbarang.stock AS stockbarang, stockbarang.harga, stockbarang.gambar, SUM(orderbarang.stock) AS belistock
    FROM stockbarang LEFT JOIN orderbarang ON stockbarang.id = orderbarang.barang_id
    GROUP BY stockbarang.id
    '
);

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
    integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">

    <title>Hoodie Strore</title>
    
    <style>
    .head {
      width: 100%;
      height: 170px;
      box-shadow: 2px 2px 8px #FA8231;
      margin-bottom: 30px;
      background: #000;
      margin: 0px;
      padding: 0px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Bad Script', cursive;
  }

  .head:after {
      content: '';
      display: block;
      clear: both;
  }

  h2 {
      margin: 0;
      padding: 0;
      color: #111;
      font-size: 6em;
  }

  h2 span {
      letter-spacing: 10px;
      display: table-cell;
      margin: 0px;
      padding-top: 20px;
      animation: animate 2s linear infinite;
  }

  h2 span:nth-child(1) {
      animation-delay: 0s
  }

  h2 span:nth-child(2) {
      animation-delay: 0.25s
  }

  h2 span:nth-child(3) {
      animation-delay: 0.5s
  }

  h2 span:nth-child(4) {
      animation-delay: 0.75s
  }

  h2 span:nth-child(5) {
      animation-delay: 1s
  }

  h2 span:nth-child(6) {
      animation-delay: 1.25s
  }

  h2 span:nth-child(7) {
      animation-delay: 1.5s
  }

  h2 span:nth-child(8) {
      animation-delay: 1.75s
  }

  h2 span:nth-child(9) {
      animation-delay: 2s
  }

  h2 span:nth-child(10) {
      animation-delay: 2.25s
  }

  h2 span:nth-child(11) {
      animation-delay: 2.5s
  }

  h2 span:nth-child(12) {
      animation-delay: 2.75s
  }

  h2 span:nth-child(13) {
      animation-delay: 3s
  }

  h2 span:nth-child(14) {
      animation-delay: 3.25s
  }

  h2 span:nth-child(15) {
      animation-delay: 3.5s
  }

  h2 span:nth-child(16) {
      animation-delay: 3.75s
  }

  h2 span:nth-child(17) {
      animation-delay: 4s
  }

  h2 span:nth-child(18) {
      animation-delay: 4.25s
  }

  @keyframes animate {

      0%,
      100% {
          color: #fff;
          filter: blur(2px);
          text-shadow: 0 0 10px #00b3ff,
              0 0 20px #00b3ff,
              0 0 40px #00b3ff,
              0 0 80px #00b3ff,
              0 0 120px #00b3ff,
              0 0 200px #00b3ff,
              0 0 230px #00b3ff,
              0 0 250px #00b3ff,
              0 0 270px #00b3ff,
              0 0 300px #00b3ff,
              0 0 330px #00b3ff,
              0 0 350px #00b3ff,
              0 0 370px #00b3ff,
              0 0 400px #00b3ff,
              0 0 430px #00b3ff,
              0 0 450px #00b3ff,
              0 0 470px #00b3ff,
              0 0 500px #00b3ff;
      }

      5%,
      95% {
          color: #111;
          filter: blur(0px);
          text-shadow: none;
      }
  }

  .container h2 {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 40px;
      padding-top: 50px;
      color: #227093;
  }

  .container hr {
      background-color: #FA8231;
  }

    .tambah {
      width: 130px;
      margin-left: 88%;
      margin-bottom: 70px;
      margin-top: -36px;
    }

    a .tambah{
          box-shadow: 2px 2px 8px #227093;
        }

    a .tambah span {
          color: black;
          font-family: 'Akaya Telivigala', cursive;
        }

    .tambah:hover {
          background-color: #227093;
        }

    .back {
        width: 130px;
    }

    a .back{
          box-shadow: 2px 2px 8px #FA8231;
        }

    a .back span {
          color: black;
          font-family: 'Akaya Telivigala', cursive;
        }

    a .back:hover {
          background-color: #FA8231;
        }

    footer {
          height: 90px;
          background-color: #227093;
          padding-top: 20px;
          font-size: 20px
        }       

    </style>
</head>

<body>
  <!-- navbar -->
  <header>
    <div class="head">
      <h2>
        <span>C</span>
        <span>h</span>
        <span>o</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>

        <span>Y</span>
        <span>o</span>
        <span>u</span>
        <span>r</span>

        <span>F</span>
        <span>a</span>
        <span>v</span>
        <span>o</span>
        <span>r</span>
        <span>i</span>
        <span>t</span>
        <span>e</span>
      </h2>
  </header>

    <!-- tambah -->

    <div class="container" style="margin-top:20px">
		<h2 class="daftar text-center" >Daftar Barang</h2>
		<hr>

        <a href="index.php"><button type="button" class="btn back"><i class="far fa-hand-point-left"></i> <span>Back User</span></button></a>
        <a href="tambah.php"><button type="button"  href="tampil.php" class="btn tambah"><i class="far fa-plus-square" ></i> <span>Tambah</span></button></a>
      
        
        <!-- barang -->
        <div class="container-fluid mb-5 mt-2">
            <div class="row">
                <table id="table_id" class="table table-striped table-bordered">
                    <thead class="text-center bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Stock</th>
                            <th>Terjual</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr> 
                    </thead> 
                    <tbody class="text-center">
                        <?php foreach ($barang as $key => $brg){ ?>
                            <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><img src="<?= $brg['gambar'] ?>" style="width:100px" alt=""></td>
                                        <td><?= $brg['nama'] ?></td>
                                        <td><?= $brg['stockbarang'] ?></td>
                                        <td>
                                            <?php if ($brg['belistock'] > 1) { ?>
                                                <?= $brg['belistock'] ?>
                                            <?php } else { ?>
                                                0
                                            <?php } ?>
                                            </td>
                                        <td><?= rupiah($brg['harga']) ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $brg['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="hapus.php?id=<?= $brg['id'] ?>" onclick = "return confirm('Yakin Ingin Menghapus Barang ini ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

  <footer class="page-footer font-small mt-1">
    <div class="footer-copyright text-center text-white py-3"> <i class="fas fa-store"></i>
      </svg>Starbhak Mart</div>
  </footer>
  


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
 integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
 crossorigin="anonymous"></script>
  
    <script src="js."></script>
</body>

</html>