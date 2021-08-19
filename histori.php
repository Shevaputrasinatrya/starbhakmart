<?php 
require 'koneksi.php';
$barang = query(
    'SELECT GROUP_CONCAT(stockbarang.nama) AS nama, 
    GROUP_CONCAT(orderbarang.stock) AS total_stock,
    GROUP_CONCAT(stockbarang.harga) AS harga,
    belibarang.total_harga AS total_harga,
    orderbarang.created_at FROM orderbarang
    INNER JOIN stockbarang ON orderbarang.barang_id = stockbarang.id
    INNER JOIN belibarang ON orderbarang.belibarang_id = belibarang.id
    GROUP BY created_at ORDER BY created_at DESC'
)
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
    <link rel="stylesheet" href="user.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    

    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <!-- jquer -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <style>
        a {
    color: inherit;
    text-decoration: none;
    }

    .head {
        width: 100%;
        padding-left: 40px;
        padding-right: 40px;
        box-shadow: 2px 2px 8px #FA8231;
        margin-bottom: 30px;
        background: #f1f2f6;
    }

    .head:after {
        content: '';
        display: block;
        clear: both;
    }

    .mart {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-weight: bold;
        float: left;
        margin-top: 5px;
        padding-top: 13px;
        padding-left: 3px;
        font-size: 43px;
        color: #FA8231;
    }

    .head h1 {
        position: relative;
        font-weight: bold;
        font-size: 3vw;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        float: left;
        color: #f1f2f6;
        padding-top: 20px;
        margin-top: 5px;
        -webkit-text-stroke: 0.3vw;
    }

    .head h1:before {
        font-weight: bold;
        content: attr(data-text);
        position: absolute;
        width: 0;
        height: 45px;
        color: #227093;
        -webkit-text-stroke: 0vw #dcdde1;
        border-right: 2px solid #227093;
        overflow: hidden;
        animation: animate 6s linear infinite;
        margin-left: 50px;
    }

    @keyframes animate {

        0%,
        10%,
        100% {
            width: 0;
        }

        50%,
        70% {
            width: 78%;
        }
    }

    h1 svg {
        margin-bottom: 20px;
        color: #227093;
    }

    header ul {
        float: right;
        margin-top: 10px;
    }

    header ul li {
        display: inline-block;
    }

    header ul li a {
        padding: 25px 20px;
        display: inline-block;
        font-weight: bold;
        text-decoration: none;
    }

    header ul li a:hover {
        background-color: #227093;
        color: #fff;
        text-decoration: none;
    }

    .container h2 {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 40px;
      padding-top: 50px;
      color: #FA8231;
  }

   hr {
      background-color: #FA8231;
  }

        #table_id{
            margin-right: 400px;
            margin-bottom: 100px;
        }

    thead {
        background-color: #227093;
        color: white;
    }

    footer {
          height: 90px;
          background-color: #227093;
          padding-top: 20px;
          font-size: 20px
    }       
    </style>
        
    </style>
    <<title>Hoodie Strore</title>
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
        <li><a href="index.php">User</a></li>
        <li><a href="tampil.php">Admin</a></li>
      </ul>
    </div>
  </header>

    <!-- tambah -->
    <div class="container" style="margin-top:20px">
		<h2 class="text-center" >History</h2>
		<hr>

        <!-- barang -->
        <div class="container-fluid mb-5 mt-2">
            <div class="row">
                <table id="table_id" class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah Barang</th>
                            <th>Harga</th>
                            <th>Jumlah harga</th>
                            <th>waktu</th>
                        </tr> 
                    </thead> 
                    <tbody class="text-center">
                    <?php foreach ($barang as $key => $brg) {
                                $total = $brg['total_harga'];
                                $discount = $total * 0.10;
                                $ppn = $total * 0.10;
                                ($total > 10000) ? $total = $total + $discount - $ppn : $total = $total - $ppn;
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $brg['nama'] ?></td>
                                        <td><?= $brg['total_stock'] ?></td>
                                        <td>
                                            <?php $ex = explode(',', $brg['harga']);
                                            $rupiah = [];
                                            foreach ($ex as $key => $value) {
                                                $rupiah[] = rupiah((int)$value);
                                            }
                                            echo join(',', $rupiah);
                                            ?>
                                        </td>
                                        <td><?= rupiah($total) ?></td>
                                        <td><?= date('Y/m/d', strtotime($brg['created_at'])) ?></td>
                                    </tr>
                                <?php } ?>
                    </tbody>
                </table>


        </div>
            </div>

        </div>
    </div>

        <footer class="page-footer font-small mt-1">
    <div class="footer-copyright text-center text-white py-3"> <i class="fas fa-store"></i>
      </svg>Starbhak Mart</div>
  </footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</body>

</html>