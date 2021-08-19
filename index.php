<?php
session_start();
require 'bayar.php';
$barang = query('SELECT * FROM stockbarang');

if (isset($_POST['submit'])) {
    if (bayar($_POST) > 0) { 
        header('Location: index.php');
        session_destroy();
    } else {
        header('Location: index.php?erorrngab');
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!--css -->
    <link rel="stylesheet" href="cssbaru.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    

    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <!-- jquer -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
   
    <title>Hoodie Store</title>
</head>

<body>
    <header>
    <div class="head">
      <h1 data-text="Starbhak"><svg width="1em" height="1em" viewBox="0 0 16 16"
        class="bi bi-building" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694L1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
        <path
          d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
      </svg> Starbhak</h1>
        <p class="mart">Mart</p>
      <ul>
        <li class="active"><a href="#">User</a></li>
        <li><a href="tampil.php">Admin</a></li>
      </ul>
    </div>
  </header>


    <div class="container-fluid">
        <div class="row">
            <!-- keranjang -->
            <div class="col-md-4">
                <div class="row">

                </div>
                <div class="row">
                    <div class="container">
                        <div class="text-center  mt-2 pt-2  pb-2 color-white fw-bold stock"><svg width="1em" height="1em" viewBox="0 0 16 16"
          class="bi bi-cart-plus-fill mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
        </svg> List Items</div>
                    </div>
                </div>
                <div class="keranjang mx-2 mt-2 ">
                    <div class="row ">

                        <!-- kearanjang -->
                        <?php foreach ($_SESSION as $key => $val) {
                            // var_dump($_SESSION);
                            // session_destroy();
                            $getKey = $key;
                            $getID = explode(".", $key)[1];
                            $getData = query("SELECT * FROM stockbarang WHERE id = $getID");
                            foreach ($getData as $keranjang) {
                                if (isset($total)) {
                                    $total = $keranjang['harga'] * $val + $total;
                                } else {
                                    $total = $keranjang['harga'] * $val;
                                }
                                ?>
                                <div class="card" onclick="tambahbarang('<?= $key ?>')" >
                                    <div class="row">
                                        <div class="col-3  mt-2 mb-2 ml-2 mr-2">
                                            <img src=" <?= $keranjang['gambar'] ?>" class="" alt="">
                                        </div>
                                        <div class="col-3">
                                            <div class="row cart-text mt-4">
                                                <?= $keranjang['nama'] ?>
                                            </div>
                                            <div class="row  cart-count">
                                                Harga : <?= rupiah($keranjang['harga']) ?>
                                            </div>
                                            <div class="row  cart-count">
                                                Total : <?= rupiah($val * $keranjang['harga']) ?>
                                            </div>

                                        </div>
                                        <div class="col-4 mt-2">
                                            <div class="input-group flex-nowrap mt-4 mr-4">
                                                <!-- <button class="input-group-text " id="addon-wrapping" onclick="tambahbarang('<?= $key ?>')"><i class="me-4 fa-xs fa fa-plus"></i></button> -->
                                                <input type="text" class="form-control" id="val" placeholder="1" value=" <?= $val ?>">
                                                <!-- <button class="input-group-text" id="addon-wrapping" onclick="kurangItem('<?= $key ?>')"><i class="fa fa-sm fa-minus"></i></button> -->
											</div>
                                        </div>
                                        <div class="col-2 ">
                                          <i class="fas fa-trash mt-4 fa-2x me-5"  onclick="hapusBarang('<?= $key ?>')"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
<!-- keranjang -->
                </div>
                <span class="jumlah ">
                    <table width="100%" class="ms-2 mt-2">
                        <tbody>
                            <tr>
                                <td>Discount </td>
                                <td id="diskon">
                                    <?php if (isset($total) && $total > 10000) {
                                        $discount = $total * 0.10; ?>
                                        <?= rupiah($discount) ?>
                                    <?php } else {
                                        $discount = 0; ?>
                                        Rp 0
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>PPN </td>
                                <td id="ppn">
                                    <?php if (isset($total)) {
                                        $ppn = $total * 0.20; ?>
                                        <?= rupiah($ppn) ?>
                                    <?php } else { ?>
                                        Rp 0
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr class="curl text-dark">
                                <td>Total Bayar</td>
                                <td id="total">
                                    <?php if (isset($total)) { ?>
                                        <?= rupiah($total + $discount - $ppn) ?>
                                    <?php } else { ?>
                                        Rp 0
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </span>
                <div class="yar d-flex pt-4 mx-2">
                <form action="" method="POST">
                    <button class="btn btn-md btn btn-outline-warning mr-5 mb-5 fw-bold" name="submit" type="submit" onclick = "return confirm('Klik OK jika Setuju Transaksi -> (Transaksi Berhasil) CEK ke History');" style="width: 185px;"><svg width="1em"
          height="1em" viewBox="0 0 16 16" class="bi bi-cash mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z" />
          <path
            d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
        </svg>   Bayar</button>
                </form>
                
                <a href="histori.php" type="button" class="btn btn-md  btn-outline-primary fw-bold mb-5" style="width: 45%;" > <i class="fas fa-clock"></i>  History</a>
                </div>

            </div>
            <!-- end keranjang -->

            <!-- tampilan kanan -->
            <div class="col-md-8">
                <!-- header -->
                <div class="row header m-0 p-0">


                </div>
                <!-- end header -->
                <!-- barang -->
                <div class="container brang mt-2">
                    <div class="row">
                        <?php foreach ($barang as $brg) { ?>
                            <?php if ($brg['stock'] > 0) { ?>
                                <div class="col-md-3" onclick="tambahbarang('val.<?= $brg['id'] ?>')">
                                    <div class="card mt-2 card rounded mb-2 ml-3 mr-1 mt-2 drag">
                                        <img src=" <?= $brg['gambar'] ?>" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <p class="nama fw-bold fs-5"><?= $brg['nama'] ?></p>
                                            <p class="harga fs-6"><?= rupiah($brg['harga']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>

                    </div>
                    <!-- end barang -->
                </div>
            </div>
            <!-- end tampilan kanan -->
        </div>
    </div>


    <footer class="page-footer font-small mt-1">
    <div class="footer-copyright text-center text-white py-3"> <i class="fas fa-store"></i>
      </svg>Starbhak Mart</div>
  </footer>


    <!-- Optional JavaScript; choose one of the two! -->
    
    <script src="js.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
   
   

</body>

</html>